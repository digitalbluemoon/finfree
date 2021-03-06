<?php header('content-type: application/json; charset=utf-8');


/* ***************************************
******************************************
***********
***********    GET COUNTRY, COUNTRY_CODE AND CITY FROM IP ADDRESS
***********
******************************************
*************************************** */


//
// GET THE IP ADDRESS
// 
function VisitorIP()
{ 
     if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $TheIp=$_SERVER['HTTP_X_FORWARDED_FOR'];
     else $TheIp=$_SERVER['REMOTE_ADDR'];
     
     return trim($TheIp);
}
$userIPAddress = VisitorIP();

/* ***************************************
******************************************
***********
***********    GEOPLUGIN
***********
******************************************
*************************************** */
$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $userIPAddress) );
//var_dump($geoplugin);
$userCity = $geoplugin['geoplugin_city'];
$userState = $geoplugin['geoplugin_regionName'];
$userStateCode = $geoplugin['geoplugin_region'];
$userCountry = $geoplugin['geoplugin_countryName'];
$userCountryCode = $geoplugin['geoplugin_countryCode'];
$userLat;
$userLong;
if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
 
	$userLat = $geoplugin['geoplugin_latitude'];
	$userLong = $geoplugin['geoplugin_longitude'];
}
/*
echo $userCity.'<br />';
echo $userState.'<br />';
echo $userStateCode.'<br />';
echo $userCountry.'<br />';
echo $userCountryCode.'<br />';
echo $userLat.'<br />';
echo $userLong.'<br />';
*/

$chapters=array(
  "0"=>array(
    "isJSON"=>"true",
    "id"=>"0",
    "country"=>$userCountry,
    "country_code"=>$userCountryCode,
    "province"=>$userState,
    "city"=>$userCity,
    "lat"=>$userLat,
    "long"=>$userLong,
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"",
    "info_window"=>"",
    "info_window_title"=>"",
    "info_window_body"=>"",
    "info_window_image_url"=>"",
  ),
  "1"=>array(
    "id"=>"1",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Barrie",
    "lat"=>"44.3780902",
    "long"=>"-79.7016159",
    "contact_name"=>"Barrie Name",
    "contact_email"=>"",
    "website"=>"Barrie.fin-free.com",
    "info_window"=>"Barrie Window",
    "info_window_title"=>"Barrie",
    "info_window_body"=>"Barrie resident, Kassidy, has petitioned and spoke at City Hall.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "2"=>array(
    "id"=>"2",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Brampton",
    "lat"=>"43.685271",
    "long"=>"-79.759924",
    "contact_name"=>"Brampton Contact Name",
    "contact_email"=>"",
    "website"=>"brampton.fin-free.com",
    "info_window"=>"Brampton Window",
    "info_window_title"=>"Brampton",
    "info_window_body"=>"Brampton is still working towards being Fin Free.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "3"=>array(
    "id"=>"3",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Burlington",
    "lat"=>"43.3255196",
    "long"=>"-79.7990319",
    "contact_name"=>"Burlington Contact Name",
    "contact_email"=>"",
    "website"=>"burlington.fin-free.com",
    "info_window"=>"Burlington Window",
    "info_window_title"=>"Burlington",
    "info_window_body"=>"Fin Free Burlington is working on educating the public with Sharkwater screenings and looking for support from local government. Check out their <a href=https://www.facebook.com/pages/Fin-Free-Burlington/365933656760976 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "4"=>array(
    "id"=>"4",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Alberta",
    "city"=>"Calgary",
    "lat"=>"51.045113",
    "long"=>"-114.057141",
    "contact_name"=>"Calgary Contact Name",
    "contact_email"=>"",
    "website"=>"calgary.fin-free.com",
    "info_window"=>"Calgary Window",
    "info_window_title"=>"Calgary",
    "info_window_body"=>"Calgary is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "5"=>array(
    "id"=>"5",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Etobicoke North",
    "lat"=>"43.7281335",
    "long"=>"-79.5746122",
    "contact_name"=>"Etobicoke North Contact Name",
    "contact_email"=>"",
    "website"=>"etobicoke_north.fin-free.com",
    "info_window"=>"Etobicoke North Window",
    "info_window_title"=>"Etobicoke North",
    "info_window_body"=>"Etobicoke North supports a ban on the importation of shark fins and is working with local Liberal MP, Kristy Duncan ",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "6"=>array(
    "id"=>"6",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Alberta",
    "city"=>"Edmonton",
    "lat"=>"53.5333333",
    "long"=>"-113.5",
    "contact_name"=>"Edmonton Name",
    "contact_email"=>"edmonton@gov.us",
    "website"=>"edmonton.fin-free.com",
    "info_window"=>"Edmonton Window",
    "info_window_title"=>"Edmonton",
    "info_window_body"=>"Fin Free supporters in Edmonton are working to raise awareness through lectures and canvassing.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "7"=>array(
    "id"=>"7",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Nova Scotia",
    "city"=>"Halifax",
    "lat"=>"44.6488625",
    "long"=>"-63.5753196",
    "contact_name"=>"Halifax Name",
    "contact_email"=>"halifax@gov.us",
    "website"=>"halifax.fin-free.com",
    "info_window"=>"Halifax Window",
    "info_window_title"=>"Halifax",
    "info_window_body"=>"Members of Fin Free Halifax are researching the best method to approach a ban.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "8"=>array(
    "id"=>"8",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Hamilton",
    "lat"=>"43.2500208",
    "long"=>"-79.8660914",
    "contact_name"=>"Hamilton Name",
    "contact_email"=>"hamilton@gov.us",
    "website"=>"hamilton.fin-free.com",
    "info_window"=>"Hamilton Window",
    "info_window_title"=>"Hamilton",
    "info_window_body"=>"Hamilton is supporting a federal ban and members are actively supporting other Fin Free campaigns.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "9"=>array(
    "id"=>"9",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Kingston",
    "lat"=>"44.2311717",
    "long"=>"-76.4859544",
    "contact_name"=>"Kingston Name",
    "contact_email"=>"kingston@gov.us",
    "website"=>"kingston.fin-free.com",
    "info_window"=>"Kingston Window",
    "info_window_title"=>"Kingston",
    "info_window_body"=>"The Kingston chapter is supporting the movement through fundraisers.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "10"=>array(
    "id"=>"10",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Kitchener",
    "lat"=>"43.434311",
    "long"=>"-80.4777469",
    "contact_name"=>"Kitchener Name",
    "contact_email"=>"kitchener@gov.us",
    "website"=>"kitchener.fin-free.com",
    "info_window"=>"Kitchener Window",
    "info_window_title"=>"Kitchener",
    "info_window_body"=>"Kitchener-Waterloo is looking towards a ban of shark fins and members have contacted their city council.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "11"=>array(
    "id"=>"11",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Langton",
    "lat"=>"42.741924",
    "long"=>"-80.577671",
    "contact_name"=>"Langton Name",
    "contact_email"=>"langton@gov.us",
    "website"=>"langton.fin-free.com",
    "info_window"=>"Langton Window",
    "info_window_title"=>"Langton",
    "info_window_body"=>"Fin Free Langton is focused on education and awareness. Students in the area have composed letters to local politicians urging them to consider a ban.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "12"=>array(
    "id"=>"12",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"London",
    "lat"=>"42.9869502",
    "long"=>"-81.243177",
    "contact_name"=>"London Name",
    "contact_email"=>"london@gov.us",
    "website"=>"london.fin-free.com",
    "info_window"=>"London Window",
    "info_window_title"=>"London",
    "info_window_body"=>"London is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "13"=>array(
    "id"=>"13",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Markham",
    "lat"=>"43.8561002",
    "long"=>"-79.3370188",
    "contact_name"=>"Markham Name",
    "contact_email"=>"markham@gov.us",
    "website"=>"markham.fin-free.com",
    "info_window"=>"Markham Window",
    "info_window_title"=>"Markham",
    "info_window_body"=>"Markham is focused on public education and awareness of shark issues.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "14"=>array(
    "id"=>"14",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Mississauga",
    "lat"=>"43.5890452",
    "long"=>"-79.6441198",
    "contact_name"=>"Mississauga Name",
    "contact_email"=>"Mississauga@gov.us",
    "website"=>"Mississauga.fin-free.com",
    "info_window"=>"Mississauga Window",
    "info_window_title"=>"Mississauga",
    "info_window_body"=>"Mississauga is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "15"=>array(
    "id"=>"15",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Quebec",
    "city"=>"Montreal",
    "lat"=>"45.5086699",
    "long"=>"-73.5539925",
    "contact_name"=>"Montreal Name",
    "contact_email"=>"Montreal@gov.us",
    "website"=>"Montreal.fin-free.com",
    "info_window"=>"Montreal Window",
    "info_window_title"=>"Montreal",
    "info_window_body"=>"Montreal members are working on creating awareness Local SCUBA group, Action Scuba, is even offering courses on shark education.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "16"=>array(
    "id"=>"16",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Muskoka",
    "lat"=>"44.901642",
    "long"=>"-79.575821",
    "contact_name"=>"Muskoka Name",
    "contact_email"=>"Muskoka@gov.us",
    "website"=>"Muskoka.fin-free.com",
    "info_window"=>"Muskoka Window",
    "info_window_title"=>"Muskoka",
    "info_window_body"=>"Muskoka is working with Town Council towards a shark fin ban. ",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "17"=>array(
    "id"=>"17",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"B.C.",
    "city"=>"Nanaimo",
    "lat"=>"49.1658836",
    "long"=>"-123.9400647",
    "contact_name"=>"Nanaimo Name",
    "contact_email"=>"Nanaimo@gov.us",
    "website"=>"Nanaimo.fin-free.com",
    "info_window"=>"Nanaimo Window",
    "info_window_title"=>"Nanaimo",
    "info_window_body"=>"Nanaimo is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "18"=>array(
    "id"=>"18",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Newmarket",
    "lat"=>"44.059187",
    "long"=>"-79.461256",
    "contact_name"=>"Newmarket Name",
    "contact_email"=>"Newmarket@gov.us",
    "website"=>"Newmarket.fin-free.com",
    "info_window"=>"Newmarket Window",
    "info_window_title"=>"Newmarket",
    "info_window_body"=>"Newmarket is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "19"=>array(
    "id"=>"19",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Niagara Falls",
    "lat"=>"43.0962143",
    "long"=>"-79.0377388",
    "contact_name"=>"Niagara Falls Name",
    "contact_email"=>"Niagara Falls@gov.us",
    "website"=>"Niagara Falls.fin-free.com",
    "info_window"=>"Niagara Falls Window",
    "info_window_title"=>"Niagara Falls",
    "info_window_body"=>"Members are working on education and awareness initiatives. Screenings of Sharkwater have been held and presentations at Brock University's Environment Week have been made.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "20"=>array(
    "id"=>"20",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Oakville",
    "lat"=>"43.45",
    "long"=>"-79.6833333",
    "contact_name"=>"Oakville Name",
    "contact_email"=>"Oakville@gov.us",
    "website"=>"Oakville.fin-free.com",
    "info_window"=>"Oakville Window",
    "info_window_title"=>"Oakville",
    "info_window_body"=>"Oakville is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "21"=>array(
    "id"=>"21",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Peterborough",
    "lat"=>"44.3061931",
    "long"=>"-78.3215959",
    "contact_name"=>"Peterborough Name",
    "contact_email"=>"Peterborough@gov.us",
    "website"=>"Peterborough.fin-free.com",
    "info_window"=>"Peterborough Window",
    "info_window_title"=>"Peterborough",
    "info_window_body"=>"Peterborough is working on education and awareness initiatives and is helping to rally for the national ban.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "22"=>array(
    "id"=>"22",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Pickering",
    "lat"=>"43.8384117",
    "long"=>"-79.0867579",
    "contact_name"=>"Pickering Name",
    "contact_email"=>"Pickering@gov.us",
    "website"=>"Pickering.fin-free.com",
    "info_window"=>"Pickering Window",
    "info_window_title"=>"Pickering",
    "info_window_body"=>"Pickering is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "23"=>array(
    "id"=>"23",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"B.C.",
    "city"=>"Port Moody",
    "lat"=>"49.288989",
    "long"=>"-122.847318",
    "contact_name"=>"Port Moody Name",
    "contact_email"=>"Port Moody@gov.us",
    "website"=>"Port Moody.fin-free.com",
    "info_window"=>"Port Moody Window",
    "info_window_title"=>"Port Moody",
    "info_window_body"=>"Port Moody is Fin Free!",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "24"=>array(
    "id"=>"24",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Saskatchewan",
    "city"=>"Regina",
    "lat"=>"49.288989",
    "long"=>"-122.847318",
    "contact_name"=>"Regina Name",
    "contact_email"=>"Regina@gov.us",
    "website"=>"Regina.fin-free.com",
    "info_window"=>"Regina Window",
    "info_window_title"=>"Regina",
    "info_window_body"=>"Fin Free Regina has been raising awareness through Sharkwater screenings and large scale fundraisers.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "25"=>array(
    "id"=>"25",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Richmond Hill",
    "lat"=>"43.8849",
    "long"=>"-79.4304",
    "contact_name"=>"Richmond Hill Name",
    "contact_email"=>"Richmond Hill@gov.us",
    "website"=>"Richmond Hill.fin-free.com",
    "info_window"=>"Richmond Hill Window",
    "info_window_title"=>"Richmond Hill",
    "info_window_body"=>"Richmond Hill has a councillor who is interested in a shark fin ban.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "26"=>array(
    "id"=>"26",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Sudbury",
    "lat"=>"46.49",
    "long"=>"-81.01",
    "contact_name"=>"Sudbury Name",
    "contact_email"=>"Sudbury@gov.us",
    "website"=>"Sudbury.fin-free.com",
    "info_window"=>"Sudbury Window",
    "info_window_title"=>"Sudbury",
    "info_window_body"=>"A petition with a thousand signatures was presented to the mayor by a local resident.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "27"=>array(
    "id"=>"27",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"B.C.",
    "city"=>"Vancouver",
    "lat"=>"49.261226",
    "long"=>"-123.1139268",
    "contact_name"=>"Vancouver Name",
    "contact_email"=>"Vancouver@gov.us",
    "website"=>"Vancouver.fin-free.com",
    "info_window"=>"Vancouver Window",
    "info_window_title"=>"Vancouver",
    "info_window_body"=>"Vancouver members have been raising awareness and educating the public. Recently, Vancouver has said they will look towards a shark conservation strategy.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "28"=>array(
    "id"=>"28",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Vaughn",
    "lat"=>"43.9654209",
    "long"=>"-78.3122565",
    "contact_name"=>"Vaughn Name",
    "contact_email"=>"Vaughn@gov.us",
    "website"=>"Vaughn.fin-free.com",
    "info_window"=>"Vaughn Window",
    "info_window_title"=>"Vaughn",
    "info_window_body"=>"Vaughn activists are trying to raise the issue to council members.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "29"=>array(
    "id"=>"29",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Ontario",
    "city"=>"Victoria",
    "lat"=>"48.4284207",
    "long"=>"-123.3656444",
    "contact_name"=>"Victoria Name",
    "contact_email"=>"Victoria@gov.us",
    "website"=>"Victoria.fin-free.com",
    "info_window"=>"Victoria Window",
    "info_window_title"=>"Victoria",
    "info_window_body"=>"Fin Free Victoria members have been actively raising awareness through Sharkwater screenings, petitions and fundraising activities. Check out their <a href=http://www.facebook.com/pages/Fin-Free-Victoria/263367703732989 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "30"=>array(
    "id"=>"30",
    "country"=>"Canada",
    "country_code"=>"CA",
    "province"=>"Manitoba",
    "city"=>"Winnipeg",
    "lat"=>"49.8997541",
    "long"=>"-97.1374937",
    "contact_name"=>"Winnipeg Name",
    "contact_email"=>"Winnipeg@gov.us",
    "website"=>"Winnipeg.fin-free.com",
    "info_window"=>"Winnipeg Window",
    "info_window_title"=>"Winnipeg",
    "info_window_body"=>"Check out their <a href=http://www.facebook.com/pages/Fin-Free-Winnipeg/237828979598090 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  "31"=>array(
    "id"=>"31",
    "country"=>"United States",
    "country_code"=>"US",
    "province"=>"New Jersey",
    "city"=>"Trenton",
    "lat"=>"40.219781",
    "long"=>"-74.742393",
    "contact_name"=>"Fin Free New Jersey",
    "contact_email"=>"Finfreenj@gmail.com",
    "website"=>"",
    "info_window"=>"Fin Free NJ Window",
    "info_window_title"=>"Fin Free NJ",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/pages/Fin-Free-New-Jersey/143568695810897 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
    "32"=>array(
    "id"=>"32",
    "country"=>"Thailand",
    "country_code"=>"TH",
    "province"=>"Central Thailand",
    "city"=>"Bangkok",
    "lat"=>"13.75806",
    "long"=>"100.520782",
    "contact_name"=>"Fin Free Thailand",
    "contact_email"=>"info@finfreethai.org",
    "website"=>"http://www.finfreethai.org/",
    "info_window"=>"Fin Free Thailand",
    "info_window_title"=>"Fin Free Thailand",
    "info_window_body"=>"Check out their <a href=http://www.finfreethai.org target=_blank>site</a> target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
    "33"=>array(
    "id"=>"33",
    "country"=>"Taiwan",
    "country_code"=>"TW",
    "province"=>"Taipai",
    "city"=>"Taipai",
    "lat"=>"25.106119",
    "long"=>"121.560974",
    "contact_name"=>"Fin Free Taipai",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/finfreetaipei",
    "info_window"=>"Fin Free Taipai",
    "info_window_title"=>"Fin Free Taipai",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/finfreetaipei target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
   "34"=>array(
    "id"=>"34",
    "country"=>"South Africa",
    "country_code"=>"ZA",
    "province"=>"Gauteng",
    "city"=>"Johannesburg",
    "lat"=>"-26.140645",
    "long"=>"27.973938",
    "contact_name"=>"Fin Free South Africa",
    "contact_email"=>"finfreesouthafrica@gmail.com",
    "website"=>"https://www.facebook.com/FinFreeSouthAfrica",
    "info_window"=>"Fin Free South Africa",
    "info_window_title"=>"Fin Free South Africa",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeSouthAfrica target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
   "35"=>array(
    "id"=>"35",
    "country"=>"United States",
    "country_code"=>"US",
    "province"=>"Florida",
    "city"=>"Casselberry",
    "lat"=>"28.684564",
    "long"=>"-81.327324",
    "contact_name"=>"Thomas Ponce",
    "contact_email"=>"thomasponce@lobbyforanimals.org",
    "website"=>"http://thomasponce.wix.com/fin-free-florida",
    "info_window"=>"Fin Free Florida",
    "info_window_title"=>"Fin Free Florida",
    "info_window_body"=>"Check out their <a href=http://thomasponce.wix.com/fin-free-florida target=_blank>site</a> target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
   "36"=>array(
    "id"=>"36",
    "country"=>"United States",
    "country_code"=>"US",
    "province"=>"Maryland",
    "city"=>"Baltimore/D.C.",
    "lat"=>"38.918284",
    "long"=>"-77.03476",
    "contact_name"=>"Fin Free Baltimore/D.C.",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeBaltimoreDC",
    "info_window"=>"Fin Free Baltimore/D.C.",
    "info_window_title"=>"Fin Free Baltimore/D.C.",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeBaltimoreDC target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
   "37"=>array(
    "id"=>"37",
    "country"=>"United States",
    "country_code"=>"US",
    "province"=>"Pennsylvania",
    "city"=>"Philadelphia",
    "lat"=>"39.976068",
    "long"=>"-75.162964",
    "contact_name"=>"Fin Free Pennsylvania",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeBaltimoreDC",
    "info_window"=>"Fin Free Pennsylvania",
    "info_window_title"=>"Fin Free Pennsylvania",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreePA target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
   "38"=>array(
    "id"=>"38",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"New South Wales",
    "city"=>"Sydney",
    "lat"=>"-33.811102",
    "long"=>"151.207581",
    "contact_name"=>"Fin Free Sydney",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/finfreesydney",
    "info_window"=>"Fin Free Sydney",
    "info_window_title"=>"Fin Free Sydney",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/finfreesydney target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
    ),
   "39"=>array(
    "id"=>"39",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Australian Capital Territory",
    "city"=>"Canberra",
    "lat"=>"-33.811102",
    "long"=>"151.207581",
    "contact_name"=>"Fin Free Australia",
    "contact_email"=>"finfreeaus@unitedconservationists.org",
    "website"=>"https://www.facebook.com/FinFreeAustralia",
    "info_window"=>"Fin Free Australia",
    "info_window_title"=>"Fin Free Australia",
    "info_window_body"=>"Check out <a href=https://www.facebook.com/FinFreeAustralia target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
    ),
   "40"=>array(
    "id"=>"40",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"South Australia",
    "city"=>"Adelaide",
    "lat"=>"-34.876918",
    "long"=>"138.600769",
    "contact_name"=>"Fin Free Adelaide",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeAdelaide",
    "info_window"=>"Fin Free Adelaide",
    "info_window_title"=>"Fin Free Adelaide",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeAdelaide target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
     "41"=>array(
    "id"=>"41",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Melbourne",
    "lat"=>"-37.755516",
    "long"=>"144.970093",
    "contact_name"=>"Fin Free Melbourne",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeMelbourne",
    "info_window"=>"Fin Free Melbourne",
    "info_window_title"=>"Fin Free Melbourne",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeMelbourne target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
     "42"=>array(
    "id"=>"42",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"New South Wales",
    "city"=>"Albury",
    "lat"=>"-36.079072",
    "long"=>"146.916561",
    "contact_name"=>"Fin Free Albury Wodonga",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeAlburyWodonga",
    "info_window"=>"Fin Free Albury Wodonga",
    "info_window_title"=>"Fin Free Albury Wodonga",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeAlburyWodonga target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
       "43"=>array(
    "id"=>"43",
    "country"=>"New Zealand",
    "country_code"=>"NZ",
    "province"=>"Wellington",
    "city"=>"Wellington",
    "lat"=>"-41.27471",
    "long"=>"174.776001",
    "contact_name"=>"Fin Free New Zealand",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/pages/Fin-Free-New-Zealand/441902089172900",
    "info_window"=>"Fin Free New Zealand",
    "info_window_title"=>"Fin Free New Zealand",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/pages/Fin-Free-New-Zealand/441902089172900 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
        "44"=>array(
    "id"=>"44",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Western Australia",
    "city"=>"Perth",
    "lat"=>"-31.875225",
    "long"=>"115.853577",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/pages/Fin-Free-Perth/739879256023288",
    "info_window"=>"Fin Free Perth",
    "info_window_title"=>"Fin Free Perth",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/pages/Fin-Free-Perth/739879256023288 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
        "45"=>array(
    "id"=>"45",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Queensland",
    "city"=>"Brisbane",
    "lat"=>"-27.408347",
    "long"=>"153.028564",
    "contact_name"=>"",
    "contact_email"=>"info@finfreebrisbane.com.au",
    "website"=>"http://www.finfreebrisbane.com.au/",
    "info_window"=>"Fin Free Brisbane",
    "info_window_title"=>"Fin Free Brisbane",
    "info_window_body"=>"Check out http://www.finfreebrisbane.com.au/ target=_blank>site</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
          "46"=>array(
    "id"=>"46",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Hobsons Bay",
    "lat"=>"-37.86347",
    "long"=>"144.83109",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeHobsonsBay",
    "info_window"=>"Fin Free Hobsons Bay",
    "info_window_title"=>"Fin Free Hobsons Bay",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeHobsonsBay target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
    "47"=>array(
    "id"=>"47",
    "country"=>"United States",
    "country_code"=>"US",
    "province"=>"Massachusetts",
    "city"=>"Boston",
    "lat"=>"42.371735",
    "long"=>"-71.05957",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeMassachusetts",
    "info_window"=>"Fin Free Massachusetts",
    "info_window_title"=>"Fin Free Massachusetts",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeMassachusetts target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
          "48"=>array(
    "id"=>"48",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Frankston",
    "lat"=>"-38.138337",
    "long"=>"145.122871",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/pages/Fin-Free-Frankston/118319291670981",
    "info_window"=>"Fin Free Frankston",
    "info_window_title"=>"Fin Free Frankston",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/pages/Fin-Free-Frankston/118319291670981 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
            "49"=>array(
    "id"=>"49",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Greensborough",
    "lat"=>"-37.688592",
    "long"=>"145.108473",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/pages/Fin-Free-Nillumbik/198377833620203",
    "info_window"=>"Fin Free Nillumbik",
    "info_window_title"=>"Fin Free Nillumbik",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/pages/Fin-Free-Nillumbik/198377833620203 target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
              "50"=>array(
    "id"=>"50",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Richmond",
    "lat"=>"-37.81809",
    "long"=>"145.00082",
    "contact_name"=>"",
    "contact_email"=>"sharkdefenceaustralia@gmail.com",
    "website"=>"https://www.facebook.com/FinFreeYarra",
    "info_window"=>"Fin Free Yarra",
    "info_window_title"=>"Fin Free Yarra",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeYarra target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
                "51"=>array(
    "id"=>"51",
    "country"=>"United Kingdom",
    "country_code"=>"GB",
    "province"=>"West Yorkshire",
    "city"=>"Leeds",
    "lat"=>"53.812004",
    "long"=>"-1.551819",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://twitter.com/FinFreeLeeds",
    "info_window"=>"Fin Free Leeds",
    "info_window_title"=>"Fin Free Leeds",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/finfreeleeds target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
              "52"=>array(
    "id"=>"52",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Mornington Peninsula",
    "lat"=>"-38.260828",
    "long"=>"145.092316",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreePeninsula",
    "info_window"=>"Fin Free Peninsula",
    "info_window_title"=>"Fin Free Peninsula",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreePeninsula target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
                "53"=>array(
    "id"=>"53",
    "country"=>"Australia",
    "country_code"=>"AU",
    "province"=>"Victoria",
    "city"=>"Lilydale",
    "lat"=>"-37.737055",
    "long"=>"145.354614",
    "contact_name"=>"",
    "contact_email"=>"",
    "website"=>"https://www.facebook.com/FinFreeRanges",
    "info_window"=>"Fin Free Ranges",
    "info_window_title"=>"Fin Free Ranges",
    "info_window_body"=>"Check out their <a href=https://www.facebook.com/FinFreeRanges target=_blank>Facebook page</a> for more information.",
    "info_window_image_url"=>"/dir/to/the/image.jpg",
  ),
  );



$json = json_encode($chapters);
/*************************

      USED FOR JSONP SO WE CAN SERVE CONTENT CROSS DOMAIN WITHOUT BEING HACKED

************************** */
# JSON if no callback
if( ! isset($_GET['callback']))
    exit($json);

# JSONP if valid callback
if(is_valid_callback($_GET['callback']))
    exit("{$_GET['callback']}($json)");

# Otherwise, bad request
header('status: 400 Bad Request', true, 400);

# So we dont get hacked
function is_valid_callback($subject)
{
    $identifier_syntax
      = '/^[$_\p{L}][$_\p{L}\p{Mn}\p{Mc}\p{Nd}\p{Pc}\x{200C}\x{200D}]*+$/u';

    $reserved_words = array('break', 'do', 'instanceof', 'typeof', 'case',
      'else', 'new', 'var', 'catch', 'finally', 'return', 'void', 'continue', 
      'for', 'switch', 'while', 'debugger', 'function', 'this', 'with', 
      'default', 'if', 'throw', 'delete', 'in', 'try', 'class', 'enum', 
      'extends', 'super', 'const', 'export', 'import', 'implements', 'let', 
      'private', 'public', 'yield', 'interface', 'package', 'protected', 
      'static', 'null', 'true', 'false');

    return preg_match($identifier_syntax, $subject)
        && ! in_array(mb_strtolower($subject, 'UTF-8'), $reserved_words);
}
/* ***************************************
******************************************
***********
***********    GET COUNTRY, COUNTRY_CODE AND CITY FROM IP ADDRESS
***********
******************************************
*************************************** */
function countryCityFromIP($ipAddr)
{
     //function to find country and city from IP address
     //Developed by Roshan Bhattarai http://roshanbh.com.np
     
     //verify the IP address for the
     ip2long($ipAddr)== -1 || ip2long($ipAddr) === false ? trigger_error("Invalid IP", E_USER_ERROR) : "";
     $ipDetail=array(); //initialize a blank array
     
     //get the XML result from hostip.info
     $xml = file_get_contents("http://api.hostip.info/?ip=".$ipAddr);
     
     //get the city name inside the node <gml:name> and </gml:name>
     preg_match("@<Hostip>(\s)*<gml:name>(.*?)</gml:name>@si",$xml,$match);
     
     //assing the city name to the array
     $ipDetail['city']=$match[2]; 
     
     //get the country name inside the node <countryName> and </countryName>
     preg_match("@<countryName>(.*?)</countryName>@si",$xml,$matches);
     
     //assign the country name to the $ipDetail array
     $ipDetail['country']=$matches[1];
     
     //get the country name inside the node <countryName> and </countryName>
     preg_match("@<countryAbbrev>(.*?)</countryAbbrev>@si",$xml,$cc_match);
     $ipDetail['country_code']=$cc_match[1]; //assing the country code to array
     
     //return the array containing city, country and country code
     return $ipDetail;
}
//
// CALL THE FUNCTION TO GET RESULT
//
$IPDetail=countryCityFromIP('12.215.42.19');
$userCountry = $IPDetail['country']; //country of that IP address
$userCity = $IPDetail['city']; //outputs the IP detail of the city
$userCountryCode = $IPDetail['country_code']; //country_code of that IP address

?>