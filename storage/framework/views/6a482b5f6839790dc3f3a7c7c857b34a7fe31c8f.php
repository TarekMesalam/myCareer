<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="company_name"><?php echo app('translator')->getFromJson('modules.accountSettings.companyName'); ?></label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo e($global->company_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_email"><?php echo app('translator')->getFromJson('modules.accountSettings.companyEmail'); ?></label>
                            <input type="email" class="form-control" id="company_email" name="company_email" value="<?php echo e($global->company_email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_phone"><?php echo app('translator')->getFromJson('modules.accountSettings.companyPhone'); ?></label>
                            <input type="tel" class="form-control" id="company_phone" name="company_phone" value="<?php echo e($global->company_phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyWebsite'); ?></label>
                            <input type="text" class="form-control" id="website" name="website" value="<?php echo e($global->website); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyLogo'); ?></label>
                             <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now" name="logo" class="dropify"
                                        <?php if(is_null($global->logo)): ?>
                                            data-default-file="<?php echo e(asset('app-logo.png')); ?>"
                                        <?php else: ?>
                                            data-default-file="<?php echo e(asset('user-uploads/app-logo/'.$global->logo)); ?>"
                                        <?php endif; ?>
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.companyAddress'); ?></label>
                            <textarea class="form-control" id="address" rows="5" name="address"><?php echo e($global->address); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.defaultTimezone'); ?></label>
                            <select name="timezone" id="timezone" class="form-control select2 custom-select">
                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($global->timezone == $tz): ?> selected <?php endif; ?>><?php echo e($tz); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.changeLanguage'); ?></label>
                            <select class="form-control" name="locale">
                                <option value="en" <?php if($global->locale == "en"): ?> selected <?php endif; ?> >English</option>
                                <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?>  data-content='<span class="flag-icon flag-icon-<?php echo e($language->language_code); ?>"></span> <?php echo e($language->language_name); ?>'><?php echo e($language->language_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            
                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.getLocation'); ?></label>
                            <input type="text" class="form-control" id="gmap_geocoding_address">
                            <input type="hidden" id="latitude" name="latitude" value="<?php echo e($global->latitude); ?>">
                            <input type="hidden" id="longitude" name="longitude" value="<?php echo e($global->longitude); ?>">
                            <div id="gmap_geocoding" class="gmaps"></div>
                        </div>
                        <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10"><?php echo app('translator')->getFromJson('app.save'); ?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        "use strict";

        $('#save-form').on('click', function(){
            $.easyAjax({
                url: '<?php echo e(route('admin.settings.update', ['1'])); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            });
        });

        var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress("<?php echo app('translator')->getFromJson('messages.cannotDetermineAddress'); ?>");
                }
            });
        }

        function updateMarkerStatus(str) {
            //
        }

        function updateMarkerPosition(latLng) {
            $('#latitude').val(latLng.lat());
            $('#longitude').val(latLng.lng());
        }

        function updateMarkerAddress(str) {
            //
        }

        function initialize() {
            var clat = $('#latitude').val();
            var clong = $('#longitude').val();

            clat = parseFloat(clat);
            clong = parseFloat(clong);

            var latLng = new google.maps.LatLng(clat, clong);

            var mapOptions = {
                center: latLng,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById('gmap_geocoding'), mapOptions);

            var input = document.getElementById('gmap_geocoding_address');

            var autocomplete = new google.maps.places.Autocomplete(input);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                position: latLng,
                title: 'NCMS',
                map: map,
                draggable: true
            });

            updateMarkerPosition(latLng);

            geocodePosition(latLng);

            google.maps.event.addListener(marker, 'dragstart', function () {
                updateMarkerAddress("<?php echo app('translator')->getFromJson('messages.dragging'); ?>");
            });

            google.maps.event.addListener(marker, 'drag', function () {
                updateMarkerStatus("<?php echo app('translator')->getFromJson('messages.dragging'); ?>");
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                updateMarkerStatus("<?php echo app('translator')->getFromJson('messages.dragEnded'); ?>");
                geocodePosition(marker.getPosition());
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                infowindow.close();
                var place = autocomplete.getPlace();

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(10);
                }

                marker.setPosition(place.geometry.location);
                updateMarkerPosition(place.geometry.location);

                var address = '';
            });

            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                google.maps.event.addDomListener(radioButton, 'click', function () {
                    autocomplete.setTypes(types);
                });
            }
        }

        $('#gmap_geocoding_address').on('keydown', function(event){
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        <?php if(!is_null($global->latitude)): ?>
            initialize();
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\my_carear\myCareer\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>