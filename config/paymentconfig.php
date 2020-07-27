<?php
// use App\Settings;
// use Illuminate\Database\Eloquent\Model;
// use App\Settings;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model as Eloquent;

// // return require __DIR__.'/path_to/bootstrap/start.php';
// $settings=new Settings();

// $settings = config('app.settings_model'); // app in file name
// $settings=DB::table('settings');
// $apikey = $settings::where('constant', 'apikey')->first('value')->value;
// $username  = $settings::where('constant', 'username')->first('value')->value;
// $password =$settings::where('constant', 'password')->first('value')->value;
// $data['username']=$apikey;
//  $data['password']=$username;
//  $data['basURL'] = $password;


 
 $data['username']='apiaccount@myfatoorah.com';
 $data['password']='api12345*';
 $data['basURL'] = "https://apidemo.myfatoorah.com";

 return $data;
 ?>
