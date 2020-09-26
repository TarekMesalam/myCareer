<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_code', 5);
            $table->string('country_name');
        });

        DB::statement("INSERT INTO `countries` VALUES (null, 'AF', 'Afghanistan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AL', 'Albania');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DZ', 'Algeria');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DS', 'American Samoa');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AD', 'Andorra');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AO', 'Angola');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AI', 'Anguilla');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AQ', 'Antarctica');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AG', 'Antigua and Barbuda');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AR', 'Argentina');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AM', 'Armenia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AW', 'Aruba');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AU', 'Australia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AT', 'Austria');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AZ', 'Azerbaijan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BS', 'Bahamas');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BH', 'Bahrain');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BD', 'Bangladesh');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BB', 'Barbados');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BY', 'Belarus');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BE', 'Belgium');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BZ', 'Belize');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BJ', 'Benin');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BM', 'Bermuda');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BT', 'Bhutan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BO', 'Bolivia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BA', 'Bosnia and Herzegovina');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BW', 'Botswana');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BV', 'Bouvet Island');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BR', 'Brazil');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IO', 'British Indian Ocean Territory');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BN', 'Brunei Darussalam');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BG', 'Bulgaria');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BF', 'Burkina Faso');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'BI', 'Burundi');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KH', 'Cambodia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CM', 'Cameroon');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CA', 'Canada');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CV', 'Cape Verde');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KY', 'Cayman Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CF', 'Central African Republic');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TD', 'Chad');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CL', 'Chile');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CN', 'China');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CX', 'Christmas Island');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CC', 'Cocos (Keeling) Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CO', 'Colombia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KM', 'Comoros');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CG', 'Congo');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CK', 'Cook Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CR', 'Costa Rica');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'HR', 'Croatia (Hrvatska)');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CU', 'Cuba');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CY', 'Cyprus');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CZ', 'Czech Republic');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DK', 'Denmark');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DJ', 'Djibouti');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DM', 'Dominica');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DO', 'Dominican Republic');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TP', 'East Timor');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'EC', 'Ecuador');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'EG', 'Egypt');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SV', 'El Salvador');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GQ', 'Equatorial Guinea');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ER', 'Eritrea');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'EE', 'Estonia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ET', 'Ethiopia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FK', 'Falkland Islands (Malvinas)');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FO', 'Faroe Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FJ', 'Fiji');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FI', 'Finland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FR', 'France');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FX', 'France, Metropolitan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GF', 'French Guiana');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PF', 'French Polynesia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TF', 'French Southern Territories');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GA', 'Gabon');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GM', 'Gambia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GE', 'Georgia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'DE', 'Germany');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GH', 'Ghana');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GI', 'Gibraltar');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GK', 'Guernsey');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GR', 'Greece');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GL', 'Greenland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GD', 'Grenada');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GP', 'Guadeloupe');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GU', 'Guam');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GT', 'Guatemala');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GN', 'Guinea');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GW', 'Guinea-Bissau');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GY', 'Guyana');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'HT', 'Haiti');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'HM', 'Heard and Mc Donald Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'HN', 'Honduras');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'HK', 'Hong Kong');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'HU', 'Hungary');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IS', 'Iceland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IN', 'India');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IM', 'Isle of Man');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ID', 'Indonesia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IR', 'Iran (Islamic Republic of)');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IQ', 'Iraq');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IE', 'Ireland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IL', 'Israel');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'IT', 'Italy');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CI', 'Ivory Coast');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'JE', 'Jersey');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'JM', 'Jamaica');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'JP', 'Japan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'JO', 'Jordan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KZ', 'Kazakhstan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KE', 'Kenya');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KI', 'Kiribati');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KP', 'Korea, Democratic People''s Republic of');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KR', 'Korea, Republic of');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'XK', 'Kosovo');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KW', 'Kuwait');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KG', 'Kyrgyzstan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LA', 'Lao People''s Democratic Republic');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LV', 'Latvia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LB', 'Lebanon');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LS', 'Lesotho');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LR', 'Liberia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LY', 'Libyan Arab Jamahiriya');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LI', 'Liechtenstein');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LT', 'Lithuania');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LU', 'Luxembourg');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MO', 'Macau');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MK', 'Macedonia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MG', 'Madagascar');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MW', 'Malawi');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MY', 'Malaysia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MV', 'Maldives');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ML', 'Mali');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MT', 'Malta');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MH', 'Marshall Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MQ', 'Martinique');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MR', 'Mauritania');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MU', 'Mauritius');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TY', 'Mayotte');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MX', 'Mexico');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'FM', 'Micronesia, Federated States of');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MD', 'Moldova, Republic of');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MC', 'Monaco');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MN', 'Mongolia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ME', 'Montenegro');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MS', 'Montserrat');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MA', 'Morocco');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MZ', 'Mozambique');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MM', 'Myanmar');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NA', 'Namibia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NR', 'Nauru');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NP', 'Nepal');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NL', 'Netherlands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AN', 'Netherlands Antilles');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NC', 'New Caledonia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NZ', 'New Zealand');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NI', 'Nicaragua');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NE', 'Niger');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NG', 'Nigeria');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NU', 'Niue');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NF', 'Norfolk Island');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'MP', 'Northern Mariana Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'NO', 'Norway');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'OM', 'Oman');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PK', 'Pakistan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PW', 'Palau');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PS', 'Palestine');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PA', 'Panama');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PG', 'Papua New Guinea');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PY', 'Paraguay');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PE', 'Peru');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PH', 'Philippines');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PN', 'Pitcairn');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PL', 'Poland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PT', 'Portugal');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PR', 'Puerto Rico');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'QA', 'Qatar');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'RE', 'Reunion');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'RO', 'Romania');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'RU', 'Russian Federation');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'RW', 'Rwanda');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'KN', 'Saint Kitts and Nevis');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LC', 'Saint Lucia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VC', 'Saint Vincent and the Grenadines');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'WS', 'Samoa');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SM', 'San Marino');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ST', 'Sao Tome and Principe');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SA', 'Saudi Arabia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SN', 'Senegal');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'RS', 'Serbia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SC', 'Seychelles');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SL', 'Sierra Leone');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SG', 'Singapore');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SK', 'Slovakia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SI', 'Slovenia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SB', 'Solomon Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SO', 'Somalia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ZA', 'South Africa');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GS', 'South Georgia South Sandwich Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ES', 'Spain');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'LK', 'Sri Lanka');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SH', 'St. Helena');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'PM', 'St. Pierre and Miquelon');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SD', 'Sudan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SR', 'Suriname');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SJ', 'Svalbard and Jan Mayen Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SZ', 'Swaziland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SE', 'Sweden');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'CH', 'Switzerland');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'SY', 'Syrian Arab Republic');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TW', 'Taiwan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TJ', 'Tajikistan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TZ', 'Tanzania, United Republic of');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TH', 'Thailand');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TG', 'Togo');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TK', 'Tokelau');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TO', 'Tonga');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TT', 'Trinidad and Tobago');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TN', 'Tunisia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TR', 'Turkey');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TM', 'Turkmenistan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TC', 'Turks and Caicos Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'TV', 'Tuvalu');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'UG', 'Uganda');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'UA', 'Ukraine');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'AE', 'United Arab Emirates');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'GB', 'United Kingdom');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'US', 'United States');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'UM', 'United States minor outlying islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'UY', 'Uruguay');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'UZ', 'Uzbekistan');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VU', 'Vanuatu');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VA', 'Vatican City State');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VE', 'Venezuela');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VN', 'Vietnam');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VG', 'Virgin Islands (British)');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'VI', 'Virgin Islands (U.S.)');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'WF', 'Wallis and Futuna Islands');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'EH', 'Western Sahara');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'YE', 'Yemen');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ZR', 'Zaire');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ZM', 'Zambia');");
        DB::statement("INSERT INTO `countries` VALUES (null, 'ZW', 'Zimbabwe');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}