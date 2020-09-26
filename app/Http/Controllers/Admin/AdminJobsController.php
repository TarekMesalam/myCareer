<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Http\Requests\StoreJob;
use App\Job;
use App\JobCategory;
use App\JobLocation;
use App\JobQuestion;
use App\JobSkill;
use App\Question;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Company;
use App\Country;

class AdminJobsController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('menu.jobs');
        $this->pageIcon = 'icon-badge';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(!$this->user->can('view_jobs'), 403);

        $this->companies = Company::all();
        $this->totalJobs = Job::count();
        $this->activeJobs = Job::where('status', 'active')->count();
        $this->inactiveJobs = Job::where('status', 'inactive')->count();

        return view('admin.jobs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!$this->user->can('add_jobs'), 403);

        $this->categories = JobCategory::all();
        $this->locations = JobLocation::all();
        $this->questions = Question::all();
        $this->companies = Company::all();
        return view('admin.jobs.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJob $request)
    {
        abort_if(!$this->user->can('add_jobs'), 403);

        $job = new Job();
        $job->slug = null;
        $job->company_id = 1;
        $job->title = $request->title;
        $job->job_description = $request->job_description;
        $job->job_requirement = $request->job_requirement;
        $job->total_positions = $request->total_positions;
        $job->location_id = $request->location_id;
        $job->category_id = $request->category_id;
        $job->start_date = $request->start_date;
        $job->end_date = $request->end_date;
        $job->status = $request->status;
        $job->save();

        if (!is_null($request->skill_id)) {
            JobSkill::where('job_id', $job->id)->delete();

            foreach ($request->skill_id as $skill) {
                $jobSkill = new JobSkill();
                $jobSkill->skill_id = $skill;
                $jobSkill->job_id = $job->id;
                $jobSkill->save();
            }
        }

        // Save Question for job
        if (!is_null($request->question)) {
            JobQuestion::where('job_id', $job->id)->delete();

            foreach ($request->question as $question) {
                $jobQuestion = new JobQuestion();
                $jobQuestion->question_id = $question;
                $jobQuestion->job_id = $job->id;
                $jobQuestion->save();
            }
        }

        return Reply::redirect(route('admin.jobs.index'), __('menu.jobs') . ' ' . __('messages.createdSuccessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(!$this->user->can('edit_jobs'), 403);
        $this->job = Job::find($id);
        $this->categories = JobCategory::all();
        $this->locations = JobLocation::all();
        $this->skills = Skill::where('category_id', $this->job->category_id)->get();
        $this->jobQuestion = JobQuestion::where('job_id', $id)->pluck('question_id')->toArray();
        $this->questions = Question::all();
        $this->companies = Company::all();

        return view('admin.jobs.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreJob $request, $id)
    {
        abort_if(!$this->user->can('edit_jobs'), 403);

        $job = Job::find($id);
        $job->title = $request->title;
        $job->job_description = $request->job_description;
        $job->job_requirement = $request->job_requirement;
        $job->total_positions = $request->total_positions;
        $job->location_id = $request->location_id;
        $job->category_id = $request->category_id;
        $job->start_date = $request->start_date;
        $job->end_date = $request->end_date;
        $job->status = $request->status;
        $job->save();

        if (!is_null($request->skill_id)) {
            JobSkill::where('job_id', $job->id)->delete();

            foreach ($request->skill_id as $skill) {
                $jobSkill = new JobSkill();
                $jobSkill->skill_id = $skill;
                $jobSkill->job_id = $job->id;
                $jobSkill->save();
            }
        }

		if (!is_null($request->question)) {
            JobQuestion::where('job_id', $job->id)->delete();

            foreach ($request->question as $question) {
                $jobQuestion = new JobQuestion();
                $jobQuestion->question_id = $question;
                $jobQuestion->job_id = $job->id;
                $jobQuestion->save();
            }
        }

        return Reply::redirect(route('admin.jobs.index'), __('menu.jobs') . ' ' . __('messages.updatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(!$this->user->can('delete_jobs'), 403);

        Job::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }

    public function data()
    {
        abort_if(!$this->user->can('view_jobs'), 403);

        $categories = Job::where('id', '>', '0');

        if (\request('filter_company') != "") {
            $categories->where('company_id', \request('filter_company'));
        }

        if (\request('filter_status') != "") {
            $categories->where('status', \request('filter_status'));
        }

        $categories->get();

        return DataTables::of($categories)
            ->addColumn('action', function ($row) {
                $action = '';

                if ($this->user->can('edit_jobs')) {
					$action .= '<a href="' . route('admin.jobs.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
						data-toggle="tooltip" data-original-title="' . __('app.edit') . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                }

                if ($this->user->can('delete_jobs')) {
					$action .= ' <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
						data-toggle="tooltip" data-row-id="' . $row->id . '" data-original-title="' . __('app.delete') . '"><i class="fa fa-times" aria-hidden="true"></i></a>';
                }
                return $action;
            })
            ->editColumn('title', function ($row) {
                return ucfirst($row->title);
            })
            ->editColumn('company_id', function ($row) {
                return ucwords($row->company->company_name);
            })
            ->editColumn('location_id', function ($row) {
                return ucfirst($row->location->location) . ' (' . $row->location->country->country_code . ')';
            })
            ->editColumn('start_date', function ($row) {
                return $row->start_date->format('d M, Y');
            })
            ->editColumn('end_date', function ($row) {
                return $row->end_date->format('d M, Y');
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 'active') {
                    return '<label class="badge bg-success">' . __('app.active') . '</label>';
                }
                if ($row->status == 'inactive') {
                    return '<label class="badge bg-danger">' . __('app.inactive') . '</label>';
                }
            })
            ->rawColumns(['status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

	public function getAllJobs() {
		$response["jobs"] = array();
		$jobs = Job::all();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return response()->json([
				'job' => $response["jobs"],
				'success' => 1
			]);
		} else {
			return response()->json([
				'success' => 0
			]);
		}
	}
        
	public function getJobsByCategoryId($categoryId) {
		$response["jobs"] = array();
		$jobs = Job::where('category_id', $categoryId)->get();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return response()->json([
				'job' => $response["jobs"],
				'success' => 1
			]);
		} else {
			return response()->json([
				'success' => 0
			]);
		}
	}
	
	public function getJobsById($jobId) {
		$response["jobs"] = array();
		$jobs = Job::where('id', $jobId)->get();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());  
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return response()->json([
				'job' => $response["jobs"],
				'success' => 1
			]);
		} else {
			return response()->json([
				'success' => 0
			]);
		}
	}

	public function getAllJobsV2() {
		$response["jobs"] = array();
		$jobs = Job::where('status', 'active')->orderByDesc('created_at')->get();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());  
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return $response["jobs"];
		} else {
			return response()->json([
				'success' => 0
			]);
		}
    }

	public function getLatestJobsV2() {
		$response["jobs"] = array();
		$jobs = Job::where('status', 'active')->orderByDesc('created_at')->take(5)->get();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return $response["jobs"];
		} else {
			return response()->json([
				'success' => 0
			]);
		}
	}
	
	public function getJobsByCategoryIdV2($categoryId) {
		$response["jobs"] = array();
		$jobs = Job::where('category_id', $categoryId)->get();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return $response["jobs"];
		} else {
			return response()->json([
				'success' => 0
			]);
		}
	}
	
	public function getJobsByIdV2($jobId) {
		$response["jobs"] = array();
		$jobs = Job::where('id', $jobId)->get();
		if (sizeof($jobs) != 0) {
			foreach ($jobs as $row) {
				$job = array();
				$job["id"] = $row->id;
				$job["title"] = $row->title;
				$job["slug"] = $row->slug;
				$job["company_id"] = $row->company_id;
				$company = Company::where('id', $row->company_id)->get();
				if (sizeof($company) != 0) {
					$job["company_name"] = $company[0]["company_name"];
					$job["company_email"] = $company[0]["company_email"];
					$job["company_phone"] = $company[0]["company_phone"];
					$job["address"] = $company[0]["address"];
					$job["website"] = $company[0]["website"];
					$job["logo_url"] = $company[0]["logo_url"];
				}
				$job["job_description"] = $row->job_description;
				$job["job_requirement"] = $row->job_requirement;
				$job["total_positions"] = $row->total_positions;
				$job["location_id"] = $row->location_id;
				$location = JobLocation::where('id', $row->location_id)->get();
				if (sizeof($location) != 0) {
					$job["location"] = $location[0]["location"];
					$country = Country::where('id', $location[0]["country_id"])->get();
					if (sizeof($country) != 0) {
						$job["country_name"] = $country[0]["country_name"];
					}
				}
				$job["category_id"] = $row->category_id;
				$category = JobCategory::where('id', $row->category_id)->get();
				if (sizeof($category) != 0) {
					$job["category"] = $category[0]["name"];
				}
				$job["start_date"] = $row->start_date->format('Y-m-d H:i:s');
				$job["end_date"] = $row->end_date->format('Y-m-d H:i:s');
				$job["status"] = $row->status;
				$job["created_at"] = $row->created_at->format('Y-m-d H:i:s');
				$job["updated_at"] = $row->updated_at->format('Y-m-d H:i:s');
				$startdate = strtotime(NOW());
				$enddate = strtotime($row->end_date->format('Y-m-d H:i:s'));  
				$job["no_of_days_to_expire"] = round(abs($enddate - $startdate)/60/60/24);
				array_push($response["jobs"], $job);
			}
			
			return $response["jobs"];
		} else {
			return response()->json([
				'success' => 0
			]);
		}
	}
}