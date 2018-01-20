<?php

/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  // return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


function LLtoM($lon, $lat)
{
    $x = $lon * 20037508.34 / 180;
    $y = log(tan((90 + $lat) * pi() / 360)) / (pi() / 180);
    $y = $y * 20037508.34 / 180;
    return array($x, $y);
}
function MtoLL($x, $y)
{
    $lon = ($x / 20037508.34) * 180;
    $lat = ($y / 20037508.34) * 180;

    $lat = 180 / pi() * (2 * atan(exp($lat * pi() / 180)) - pi() / 2);
    return array($lon,$lat);

}
function GetBBOX($MapCenterLL, $widthpx, $heightpx, $widthMeters)
{
    $MapCenter = LLtoM($MapCenterLL[0], $MapCenterLL[1]);
    $heightMeters = $widthMeters * $heightpx / $widthpx;
    $BottomLeft = MtoLL($MapCenter[0] - $widthMeters / 2.0, $MapCenter[1] - $heightMeters / 2.0);
    $TopRight = MtoLL($MapCenter[0] + $widthMeters / 2.0, $MapCenter[1] + $heightMeters / 2.0);
    return $BottomLeft[0].",".$BottomLeft[1].",".$TopRight[0].",".$TopRight[1];
}

function add_products_to_cart()
{
  if(isset($_REQUEST['products'])){
    foreach ($_REQUEST['products'] as $product) {
      $user_id=get_current_user_id();
      WC()->cart->add_to_cart( $product );
    }

    update_user_meta($user_id,'address',$_REQUEST['address']);
    update_user_meta($user_id,'city',$_REQUEST['city']);
    update_user_meta($user_id,'state',$_REQUEST['state']);
    update_user_meta($user_id,'zip',$_REQUEST['zip']);
    update_user_meta($user_id,'country',$_REQUEST['country']);
    update_user_meta($user_id,'apn',$_REQUEST['apn']);
    update_user_meta($user_id,'fips',$_REQUEST['fips']);
    update_user_meta($user_id,'location_id',$_REQUEST['location_id']);
    update_user_meta($user_id,'sHosts',$_REQUEST['sHosts']);
    update_user_meta($user_id,'sCandy',$_REQUEST['sCandy']);
    update_user_meta($user_id,'datasource',$_REQUEST['datasource']);
    update_user_meta($user_id,'MapCenterLL',$_REQUEST['MapCenterLL']);
    update_user_meta($user_id,'address_2',$_REQUEST['address_2']);
  }else
  {
    die(1);
  }
  die();

}

add_action( 'wp_ajax_add_products_to_cart', 'add_products_to_cart' );
add_action('wp_ajax_nopriv_add_products_to_cart', 'add_products_to_cart');

function emptycart(){
  global $woocommerce;
  $woocommerce->cart->empty_cart();
  die();
}
add_action( 'wp_ajax_emptycart', 'emptycart' );
add_action('wp_ajax_nopriv_emptycart', 'emptycart');


// create the file for the pdf with the ordernumber
function create_pdf($ordernumber='',$productname='')
{
  if(empty($ordernumber) || empty($productname)) return;
  $uploadsdir=wp_upload_dir();
  $uploadsdir=$uploadsdir['basedir'].'/pdfs/';
  $filename = $ordernumber.'-'.$productname.'.pdf';
  $myFile=$uploadsdir.$filename;
  if(file_exists($myFile))
  {
    return $myFile;
  }else
  {
    $fh = fopen($myFile, 'w');
    return $myFile;

  }

}
function action_woocommerce_checkout_process( $filds ) { 
    if(isset($_POST['escrow-number']) && empty($_POST['escrow-number']) && $_POST['payment_method']=='cod'){
		wc_add_notice( __( 'You have to add a Escrow Number.' ), 'error' );
    }
}
         
// add the action 

add_action( 'woocommerce_checkout_process', 'action_woocommerce_checkout_process', 10, 1 ); 
add_action( 'woocommerce_payment_complete', 'my_status_pending',1,1);
function my_status_pending($order_id){
  $order=wc_get_order($order_id);
  $order_data=$order->get_data();
  $order_items=$order->get_items();

  $prodtype=0;
  // var_dump($order_data);die();
  $args = array(
      'timeout'     => 50,
      'redirection' => 5,
      'httpversion' => '1.0',
      // 'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
      'blocking'    => true,
      'headers'     => array(),
      'cookies'     => array(),
      'body'        => null,
      'compress'    => false,
      'decompress'  => true,
      'sslverify'   => true,
      'stream'      => false,
      'filename'    => null
    );
  
  $order_number=$order->id;
  $file_names=array();
  $user=get_current_user_id();
  $MapCenterLL=array();
  // for ($i=0; $i < 9999999999 ; $i++) { 
  	
  // }
  // die();
  if(!empty($user))
  {
    update_post_meta($order_id,'address',get_user_meta($user,'address',true));
    update_post_meta($order_id,'city',get_user_meta($user,'city',true));
    update_post_meta($order_id,'state',get_user_meta($user,'state',true));
    update_post_meta($order_id,'zip',get_user_meta($user,'zip',true));
    update_post_meta($order_id,'country',get_user_meta($user,'country',true));
    update_post_meta($order_id,'apn',get_user_meta($user,'apn',true));
    update_post_meta($order_id,'fips',get_user_meta($user,'fips',true));
    update_post_meta($order_id,'location_id',get_user_meta($user,'location_id',true));
    update_post_meta($order_id,'sHosts',get_user_meta($user,'sHosts',true));
    update_post_meta($order_id,'sCandy',get_user_meta($user,'sCandy',true));
    update_post_meta($order_id,'datasource',get_user_meta($user,'datasource',true));
    update_post_meta($order_id,'MapCenterLL',get_user_meta($user,'MapCenterLL',true));
    update_post_meta($order_id,'fips',get_user_meta($user,'fips',true));
    update_post_meta($order_id,'address_2',get_user_meta($user,'address_2',true));

  }

  $sAPN = get_post_meta($order_id,'apn',true);
  $address = get_post_meta($order_id,'address',true);
  $city = get_post_meta($order_id,'city',true);
  $zip = get_post_meta($order_id,'zip',true);
  $state = get_post_meta($order_id,'state',true);
  $keyname = "locid";
  $finalkeyname =$keyname;
  $locid = get_post_meta($order_id,'location_id',true);
  $location_id = get_post_meta($order_id,'location_id',true);
  $sHosts = get_post_meta($order_id,'sHosts',true);
  $sCandy = get_post_meta($order_id,'sCandy',true);
  $fips = get_post_meta($order_id,'fips',true);
  $address_2 = get_post_meta($order_id,'address_2',true);
  $datasource = "SS.Base.Parcels/Parcels";
  $MapCenterLL = get_post_meta($order_id,'MapCenterLL',true);
  $finalkeyvalue = $locid;
  $MapCenterLL[0]=$MapCenterLL[0][0];
  $MapCenterLL[1]=$MapCenterLL[1][0];
  $sCurrent = "Constructing Taxdata request";
  $today=date('Y-m-d');
  $sTaxRequest = "http://3ps.digitalmapcentral.com/taxdata/TaxData.asp?XML=<?xml version='1.0'?><IncomingData><Data category='Order'><APN>".$sAPN."</APN><StreetAddress>".$address."</StreetAddress><StreetType></StreetType><City>".$city."</City><Zip>".$zip."</Zip><Note>CentralDisclosures</Note><CustomerID>8</CustomerID><OrderDate>".$today."</OrderDate></Data></IncomingData>";
  $oNode  = wp_remote_get( $sTaxRequest, $args );
  
  $taxXML=$oNode['body'];
  $taxXML=str_replace('<?xml version="1.0" encoding="UTF-8" standalone="no" ?>', '', $taxXML);
  


  $WidthPx = 1129;  // around 7.526 x 150, this is about the
  $HeightPx = 922;  // around 6.147 x 150
  $MapWidthRWU = 5000.0;


  $sMapRequest = $sHosts."/GetMap.aspx?bbox=".GetBBOX($MapCenterLL, $WidthPx, $HeightPx, $MapWidthRWU)."&width=".$WidthPx."&height=".$HeightPx."&layers=SS.base.bing/roads,SS.Base.Parcels/Parcels&sld=,centraldisclosuresmaster.public/Styles/Parcels/house.Default.sld.xml&ShowField=;LOCID&ShowValues=;".$locid."&tempCache=true&displayInfo=true&SS_CANDY=".$sCandy;

  
  $sMapRequest = wp_remote_get($sMapRequest,$args);

  $body=$sMapRequest['body'];
  // var_dump($body);
  $product_name='';
  $item_quantity='';
  $item_total='';
 foreach ( $order_items as $item_id => $item ) {
  $prodtype=0;
  if($item_id== 49){
    $prodtype=0;
  }else if($item_id==47){
    $prodtype=1;
  }else if($item_id==45){
    $prodtype=2;
  }
 	$product_name = $item['name'];
 	$product_name=urlencode($product_name);
 	$item_quantity = $order->get_item_meta($item_id, '_qty', true);
    $item_total = $order->get_item_meta($item_id, '_line_total', true);
 }
 $total_1=$order->get_total();


  $sMapRequest1=simplexml_load_string($body);

  $oNode =$sMapRequest1;
$sMap1='';
  if (!empty($oNode->attributes()->TempUrl)) $sMap1 = $oNode->attributes()->TempUrl;
  if(get_post_meta($order_id,'escrow-number',true)!='')
  {
    $line2='&PRICE2=$15&QUANTITY2=&DESCRIPTION2=Pay through escrow';
  }else
  {
    $line2='&QUANTITY2=&DESCRIPTION2=';
  }
  $sCurrent = "Performing GetByKey request";
  $taxXML=urlencode($taxXML);
  $billtoname=$order_data['billing']['first_name'].' '.$order_data['billing']['last_name'];
  $ORDEREDBYNAME=get_user_meta($user,'first_name',true).' '.get_user_meta($user,'last_name',true);
  $sQueryString = "http://apputils.parcelstream.com/RunAsMaster?";
   $sRequest = "service=getbykey.aspx&REPNUM=".$order_id."&PROPTYPE=0&FIPS_CODE=".$fips."&REPORTDATE=".date('m/d/Y')."&INVOICEONLY=0&INCLUDETAXDATA=1&INCLUDEENVIRONMENTALDATA=1&APN=".$sAPN."&ESCROW=".get_post_meta($order_id,'escrow-number',true)."&QUANTITY1=1&DESCRIPTION1=".$product_name."&PRICE1=$".$item_total.$line2."&QUANTITY3=&DESCRIPTION3=&TOTALAMOUNT=$".$total_1."&PROPADDR1=".$address."&PROPADDR2=".$address_2."&PROPCITY=".$city."&PROPSTATE=".$state."&PROPZIP=".$zip."&PROPCOUNTY=&PROPDESC=&BILLTOZIP=".$order_data['billing']['postcode']."&BILLTOSTATE=".$order_data['billing']['state']."&BILLTOCITY=".$order_data['billing']['city']."&BILLTOADDR=".$order_data['billing']['address_1']."&BILLTOCOMPANY=".$order_data['billing']['company']."&BILLTONAME=".$billtoname."&BILLTOEMAIL=".$order_data['billing']['email']."&BILLTOPHONE=".$order_data['billing']['phone']."&ORDEREDBYCOMPANY=".get_user_meta($user,'company',true)."&ORDEREDBYNAME=".$ORDEREDBYNAME."&ORDEREDBYPHONE=".get_user_meta($user,'phone',true)."&IMAGEURL=".$sMap1."&datasource=".$datasource."&keyName=".$finalkeyname."&keyValue=".$finalkeyvalue."&prodtype=".$prodtype."&fields=*,ABANDONEDMINES(_DMP_ID,MINENAME,TYPE),AIRPORTINFLUENCEAREAS(_DMP_ID),AIRPORTS(_DMP_ID,NAME,LAN),CRITICALHABITATS(_DMP_ID,NAME),DAMINUNDATIONZONES(_DMP_ID,DAMINUNDATIONZONES._GEO_DISTANCE,DAMINUNDATIONZONES._GEO_OVERLAP),DFIRM(_DMP_ID,SFHA,FLD_ZONE),ASBESTOS(_DMP_ID),BCDC(_DMP_ID),EARTHQUAKEINTENSITY(_DMP_ID,MMI,NAME,MAG,SEGENT),FIRESEVERE(_DMP_ID),FIREWILDLAND(_DMP_ID),FUDS(_DMP_ID,FUDS_ID,NAME),HAZARDSMETADATA(_DMP_ID,NAME),IMPORTANTFARMLANDS(_DMP_ID),INDUSTRIALCOMMERCIALUSEZONES(_DMP_ID,ZONE),METHANEGAS(_DMP_ID),MINES(_DMP_ID),PETROCHEMICALCOMPLEX(_DMP_ID),RADONGAS(_DMP_ID,ZONE),SEISMICFAULT(_DMP_ID),SEISMICLANDSLIDE(_DMP_ID),SEISMICLIQUEFACTION(_DMP_ID),TSUNAMI(_DMP_ID),WHITTAKERBERMITE(_DMP_ID),WILLIAMSONACT(_DMP_ID),WOODBURNINGHEATER(_DMP_ID),SUPPLEARTHQUAKEFAULTHAZARD(_DMP_ID),SUPPLFIREHAZARD(_DMP_ID),SUPPLFLOODHAZARD(_DMP_ID),SUPPLSEISMICGEOLOGICHAZARD(_DMP_ID),COMPRESSIBLESOILSSANTACLARACOCA(_DMP_ID),DIKEFAILURESANTACLARACOCA(_DMP_ID),SEISMICFAULTSANTACLARACOCA(_DMP_ID),SEISMICLANDSLIDESANTACLARACOCA(_DMP_ID),SEISMICLIQUEFACTIONSANTACLARACOCA(_DMP_ID),SEISMICHAZARDSSANDIEGOCOCA(_DMP_ID,CATEGORY),RTFNOTICECITYOFLODICA(_DMP_ID),RTFNOTICECITYOFRIPONCA(_DMP_ID),RTFNOTICESANJOAQUINCOCA(_DMP_ID),RTFNOTICESTANISLAUSCOCA(_DMP_ID),GASPIPELINESCA(_DMP_ID,GASPIPELINESCA._GEO_DISTANCE),LUST(_DMP_ID,NAME,STATUS,CITY,NAME0,NUMBER,GLOBAL_ID,LUST._GEO_DISTANCE,LUST._GEO_OVERLAP),SOLIDWASTELANDFILLS(_DMP_ID,PLACENAME,LOCATION,ACTIVITY,SITENAME,SWISNO,SOLIDWASTELANDFILLS._GEO_DISTANCE,SOLIDWASTELANDFILLS._GEO_OVERLAP),SUPERFUNDSITES(_DMP_ID,LOC_CITY,LOC_ADD,FAC_NAME,REG_ID,SUPERFUNDSITES._GEO_DISTANCE,SUPERFUNDSITES._GEO_OVERLAP),RCRA(_DMP_ID,ID,NAME,ADDRESS,RCRA._GEO_DISTANCE),TRIS(_DMP_ID,FACILITY,CHEMICAL,TRIS._GEO_DISTANCE),ENVIROSTOR(_DMP_ID,ADDRESS,ENVIROSTOR,PROJECT_NA,PROGRAM_TY,STATUS,ENVIROSTOR._GEO_DISTANCE)&output=custom&nested=true&SS_CANDY=".$sCandy."&BIRTTemplate=Disclosure/CENTRAL/disclosure_central.rptdesign&transformer=http://maps.digitalmapcentral.com/production/aspx/apputil/GenReport.ashx&transformerclass=urltransformer&TaxData=XML:".$taxXML;

   $sQueryString=$sQueryString.$sRequest;
   // var_dump($sQueryString);die();
   $oRequest = wp_remote_post($sQueryString,array(
  'method' => 'POST',
  'content-type'=> 'application/x-www-form-urlencoded',
  // 'content-length' => strlen($sRequest),
  'timeout' => 1200000,
  'redirection' => 5,
  'httpversion' => '1.0',
  'blocking' => true,
  'headers' => array(),
  'cookies' => array()
    ));
   
  foreach ($order->get_items() as $item_key => $item_values):
    $item_data = $item_values->get_data();
    $item_id = $item_data['product_id'];
    $product = get_post($item_id);
    $item_name=$product->post_name;
    $filename=create_pdf($order_number,$item_name);

    if(file_exists($filename))
    {
      // $fh = fopen($filename, 'w');
      file_put_contents($filename,$oRequest['body']);
      $filepath=wp_upload_dir();
      $filename=$filepath['baseurl'].'/pdfs/'.$order_number.'-'.$item_name.'.pdf';
      update_post_meta($order_id,$item_name.'_pdf_url',$filename);
    }


  endforeach;


}


add_action( 'gform_after_submission_3', 'after_submission', 10, 2 );
function after_submission( $entry, $form)
{
  // var_dump($entry);
  // die();
  $user=get_current_user_id();
  
  update_user_meta($user,'first_name',$entry['1.3']);
  update_user_meta($user,'last_name',$entry['1.6']);
  update_user_meta($user,'company',$entry['3']);
  update_user_meta($user,'phone',$entry['4']);
  update_user_meta($user,'email',$entry['5']);
  update_user_meta($user,'billing_first_name',$entry['6.3']);
  update_user_meta($user,'billing_last_name',$entry['6.6']);
  update_user_meta($user,'billing_company',$entry['7']);
  update_user_meta($user,'billing_escro_num',$entry['8']);
  update_user_meta($user,'billing_address_1',$entry['9.1']);
  update_user_meta($user,'billing_address_2',$entry['9.2']);
  update_user_meta($user,'billing_city',$entry['9.3']);
  update_user_meta($user,'billing_state',$entry['9.4']);
  update_user_meta($user,'billing_country',$entry['9.6']);
  update_user_meta($user,'billing_phone',$entry['10']);
  update_user_meta($user,'billing_email',$entry['11']);
  // update_user_meta($user,'',$entry['15']);
  wp_set_password( $entry['15'], $user );
}

add_action( 'gform_after_submission_2', 'after_submission_register', 10, 2 );
function after_submission_register( $entry, $form)
{
	// die(1);
	$user=get_user_by('email',$entry['4']);
	$user_id=$user->ID;
	wp_set_current_user($user_id);
  wp_set_auth_cookie( $user_id, true, '' );
	
	wp_redirect('https://nhdgo.com/my-account-2/',302);
	
}

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(https://nhdgo.com/wp-content/uploads/2017/09/NHD-Go-Winner.png);
		height:65px;
		width:320px;
		background-size: cover;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
        #bitnami-banner
        {
          display: none !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function login_form_result(){

  if(isset($_REQUEST['username']) && !empty($_REQUEST['username']) && isset($_REQUEST['password']) && !empty($_REQUEST['password']))
  {
    $check = wp_authenticate_username_password( NULL, $_REQUEST['username'], $_REQUEST['password'] );
    if(is_wp_error( $check )){
      
      exit(0);

    }else
    {
      
      $user_id=$check->ID;
     
      wp_set_current_user($user_id);
      wp_set_auth_cookie( $user_id, true, '' );
      // echo 'success';
      exit('success');
    }
  }

}

add_action( 'wp_ajax_login_form_result', 'login_form_result' );
add_action('wp_ajax_nopriv_login_form_result', 'login_form_result');


function get_property_location_id()
{
  if( (isset($_REQUEST['address']) && isset($_REQUEST['city']) && isset($_REQUEST['state']) && $_REQUEST['zip']) || (isset($_REQUEST['apn']) && isset($_REQUEST['fips'])) ){

    $url='http://dc1.parcelstream.com/admin/getSIK.aspx?login=cduser&account=CentralDisclosures';
    $args = array(
      'timeout'     => 50,
      'redirection' => 5,
      'httpversion' => '1.0',
      // 'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
      'blocking'    => true,
      'headers'     => array(),
      'cookies'     => array(),
      'body'        => null,
      'compress'    => false,
      'decompress'  => true,
      'sslverify'   => true,
      'stream'      => false,
      'filename'    => null
    );
    $response = wp_remote_get( $url, $args );
    $body = $response['body'];
    $xml=simplexml_load_string($body);
    $key=$xml->Success->attributes()->message.'';
    $key=explode('/', $key);
    $sDC=$key[1];
    $sKey=$key[2].'/'.$key[3];  
    $sFold=$key[2];
    $keyname = "locid";
    $sQueryString = "http://".$sDC.".parcelstream.com/".$sFold."/InitSession.aspx?sik=".$sKey;
    $sresponse = wp_remote_get( $sQueryString, $args );
    $sbody = $sresponse['body']; // use the content
    $sxml=simplexml_load_string($sbody);
    $address =  $_REQUEST['address'];
    $city =  $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zip =  $_REQUEST['zip'];

    



    
    $fips = $_REQUEST['fips'];
    
    $sCandy=$sxml->Results->Data->Row->attributes()->Candy;
    $sHosts=$sxml->Results->Data->Row->attributes()->Domains;

    $finalkeyname = $keyname;
    $finalkeyvalue = '';
    $locid  = '';
    $sAPN = '';
    $sAPN1 =  '';
    $datasource = "SS.Base.Parcels/Parcels";
    $MapCenterLL=array();
   
        
        
    if($address!=''){   
    $queryString=$sHosts."/GetGeocode.aspx?address=".$address."&city=".$city."&state=".$state."&zip=".$zip."&datasource=PARCELS,STREET_CENTERLINE&fields=*,PropertyDetail_ADDID(*),SPECIALJURISDICTIONS(NAME,CRITERIA)&v=latest&showschema=false&ss_candy=".$sCandy;
    
    $response = wp_remote_get( $queryString, $args );

    $body = $response['body'];
    $xml=simplexml_load_string($body);
   
    $ADDRESSID=$xml->Results->RecordSet->Data->Row->attributes()->ADDRESSID;
    
    if(empty($ADDRESSID) || $ADDRESSID==''){
      echo 'There is no APN for this property.  Please try again later.';
      die();
    }
    $queryString=$sHosts.'/GetByKey.aspx?datasource=SS.base.PublicProp/PublicPropertyInfo&fields=*&keyName=ADDRESS_ID&keyValue='.$ADDRESSID.'&output=xml&showschema=false&SS_CANDY='.$sCandy;
    $response = wp_remote_get( $queryString, $args );
    $body = $response['body'];
    $xml=simplexml_load_string($body);

    
    $sAPN = $xml->Results->Data->Row->attributes()->APN_UNF;
    $sAPN1 = $xml->Results->Data->Row->attributes()->APN_UNF;
    
    
    
       
    $sQueryString = $sHosts."/GetGeocode.aspx?address=".$address."&city=".$city."&state=".$state."&zip=".$zip;
    
    $sQueryString = $sQueryString."&fields=*&SS_CANDY=".$sCandy;
    $sQueryString = $sQueryString."&datasource=PARCELS,STREET_CENTERLINE";
    $oResponseXML = wp_remote_get( $sQueryString, $args );
    $ResearchRequest = "CentralDisclosures.SPR/ResearchRequest";
    $CUSTOM_PARCELS = "CentralDisclosures.SPR/CustomParcels";
    $geocodeNode1 = simplexml_load_string($oResponseXML['body']);
    
    foreach ($geocodeNode1->Results->Data->Row as $row) {
      
      $source = $row->attributes()->DATASOURCE;
      $locid  = $row->attributes()->LOCID;
      $addressid   = $row->attributes()->ADDRESSID;
      $address   = $row->attributes()->ADDRESS;
      $city  = $row->attributes()->CITY;
      $state  = $row->attributes()->STATE;
      $zip  = $row->attributes()->ZIPCODE;
      $score  = $row->attributes()->SCORE;
      $MapCenterLL[0] = $row->attributes()->LON;
      $MapCenterLL[1]  = $row->attributes()->LAT;
       if ($score > 80 && $source == "PARCELS")
       {
  
          $datasource = "SS.Base.Parcels/Parcels";
          $keyname = "locid";
          $keyvalue = $locid;
          $finalkeyname =$keyname;
          $finalkeyvalue = $locid;
           
  
  
          $sQueryString = $sHosts."/GetByKey.aspx?datasource=SS.Base.PublicPropInfo/PublicPropertyInfo&fields=APN_UNF&keyName=ADDRESS_ID&keyValue=".$addressid."&output=xml&SS_CANDY=".$sCandy;
  
          $oNode  = wp_remote_get( $sQueryString, $args );
          // var_dump($oNode);
          $sCurrent = "retrieving APN";
          $oNode=simplexml_load_string($oNode['body']);
  
          $oNode=$oNode->Results->Data->Row;
          if ($oNode->attributes()->APN_UNF){
            $sAPN = $oNode->attributes()->APN_UNF;
          }
  
       }
       if($source =='CUSTOM_PARCELS' || empty($sAPN)){
         if (empty($sAPN)){
          $sQueryString = $sHosts."/getbykey.aspx?keyName=orderid&keyValue=".$orderid."&datasource=".$ResearchRequest."&fields=apn&SS_CANDY=".$sCandy;
          $oResponseXML = wp_remote_get($sQueryString,$args);
          $oNode=simplexml_load_string($oResponseXML['body']);
          $oNode = $oNode->Results->Data->Row;
           if ($oNode == '' || $oNode->attributes()->APN == '' || empty($oNode->attributes()->APN))
           {
  
           }
           $datasource = $CUSTOM_PARCELS;
           $keyname = "apn";
           $keyvalue = $oNode->attributes()->APN;
           $sAPN = $keyvalue;
            if (empty($keyvalue))
            {
              die("No parcel APN!");
            }
            $sQueryString = $sHosts."/getbykey.aspx?keyName=".$keyname."&keyValue=".$keyvalue."&datasource=".$datasource."&fields=apn&SS_CANDY=".$sCandy;
            $oResponseXML = wp_remote_get($sQueryString,$args);
            $oNode=simplexml_load_string($oResponseXML['body']);
            $oNode = $oNode->Results->Data->Row;
  
  
  
  
  
         }
       }
  
    }
  
     if (empty($oNode) || empty($oNode->attributes()->APN))
     {
  
     }
   }
      if(empty($sAPN1) && !empty($_REQUEST['apn'])){
        $sAPN1=$_REQUEST['apn'];
      }
     if(empty($finalkeyvalue)){
        $queryString="http://dc1.parcelstream.com/GetQuery.aspx?datasource=SS.Base.PublicProp/    PublicPropertyInfo&fields=LOCATION_ID,ADDRESS_ID,PropertyDetail_ADDID(*)&query=APN_UNF='".$sAPN1."' and FIPS_CODE='".$fips."    '&MaxRecords=10&showschema=false&ss_candy=".$sCandy;
        $queryString = wp_remote_get($queryString,$args);
    
        $body=$queryString['body'];
        $sxml=simplexml_load_string($body);
        foreach ($sxml->Results->Data->Row as $row) {
          $finalkeyvalue=$row->attributes()->LOCATION_ID;
        }
      }

      

      
       
      echo json_encode(array('sAPN'=>$sAPN1,'sHosts'=>$sHosts,'sCandy'=>$sCandy,'locid'=>$finalkeyvalue,'datasource'=>$datasource,'MapCenterLL'=>$MapCenterLL));

  }else
  {
    exit('failed');
  }
  exit(0);
}
add_action( 'wp_ajax_get_property_location_id', 'get_property_location_id' );
add_action('wp_ajax_nopriv_get_property_location_id', 'get_property_location_id');

function search_orders(){
  
}
add_action( 'wp_ajax_search_orders', 'search_orders' );
add_action('wp_ajax_nopriv_search_orders', 'search_orders');

add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['escrow-number'] ) ) {
        update_post_meta( $order_id, 'escrow-number', sanitize_text_field( $_POST['escrow-number'] ) );
    }
}
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


