<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('locations')->delete();

     $locations = [
     	['country_id'=>'163','state'=>'Abia','state_code'=>'NG-AB','latitude'=>'5.532003041','longitude'=>'7.486002487','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Adamawa','state_code'=>'NG-AD','latitude'=>'9.209992085','longitude'=>'12.48000281','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Akwa Ibom','state_code'=>'NG-AKB','latitude'=>'5.007996056','longitude'=>'5.007996056','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Anambra','state_code'=>'NG-AN','latitude'=>'6.210433572','longitude'=>'7.06999711','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Bauchi','state_code'=>'NG-BA','latitude'=>'11.68040977','longitude'=>'10.19001339','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Bayelsa','state_code'=>'NG-BY','latitude'=>'4.664030','longitude'=>'6.036987','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Benue','state_code'=>'NG-AB','latitude'=>'7.190399596','longitude'=>'8.129984089','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Borno','state_code'=>'NG-BR','latitude'=>'10.62042279','longitude'=>'7.486002487','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Cross River','state_code'=>'NG-CR','latitude'=>'4.960406513','longitude'=>'8.330023558','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Delta','state_code'=>'NG-DE','latitude'=>'5.890427265','longitude'=>'5.680004434','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Ebonyi','state_code'=>'NG-EB','latitude'=>'6.177973','longitude'=>'7.959286','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Edo','state_code'=>'NG-ED','latitude'=>'6.340477314','longitude'=>'5.620008096','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Ekiti','state_code'=>'NG-EK','latitude'=>'7.630372741','longitude'=>'5.219980834','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Enugu','state_code'=>'NG-EN','latitude'=>'6.867034321','longitude'=>'7.383362995','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Gombe','state_code'=>'NG-GO','latitude'=>'10.29044293','longitude'=>'11.16995357','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Imo','state_code'=>'NG-IM','latitude'=>'5.492997053','longitude'=>'7.026003588','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Jigawa','state_code'=>'NG-JI','latitude'=>'11.7991891','longitude'=>'9.350334607','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Kaduna','state_code'=>'NG-KD','latitude'=>'11.0799813','longitude'=>'7.710009724','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Kano','state_code'=>'NG-KN','latitude'=>'11.99997683','longitude'=>'8.5200378','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Katsina','state_code'=>'NG-KT','latitude'=>'11.5203937','longitude'=>'7.320007689','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Kebbi','state_code'=>'NG-KE','latitude'=>'12.45041445','longitude'=>'4.199939737','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Kogi','state_code'=>'NG-KO','latitude'=>'7.800388203','longitude'=>'6.739939737','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Kwara','state_code'=>'NG-KW','latitude'=>'8.490010192','longitude'=>'4.549995889','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Lagos','state_code'=>'NG-LA','latitude'=>'6.443261653','longitude'=>'3.391531071','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Nassarawa','state_code'=>'NG-NA','latitude'=>'8.490423603','longitude'=>'8.5200378','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Niger','state_code'=>'NG-NI','latitude'=>'10.4003587','longitude'=>'5.469939737','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Ogun','state_code'=>'NG-OG','latitude'=>'7.160427265','longitude'=>'3.350017455','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Ondo','state_code'=>'NG-ON','latitude'=>'7.250395934','longitude'=>'5.199982054','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Osun','state_code'=>'NG-OS','latitude'=>'7.629959329','longitude'=>'4.179992634','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Oyo','state_code'=>'NG-OY','latitude'=>'7.970016092','longitude'=>'3.590002806','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Plateau','state_code'=>'NG-PL','latitude'=>'9.929973978','longitude'=>'8.890041055','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Rivers','state_code'=>'NG-RI','latitude'=>'4.810002257','longitude'=>'7.010000772','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Sokoto','state_code'=>'NG-SO','latitude'=>'13.06001548','longitude'=>'5.240031289','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Taraba','state_code'=>'NG-TA','latitude'=>'7.870409769','longitude'=>'9.780012572','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Yobe','state_code'=>'NG-YO','latitude'=>'11.74899608','longitude'=>'11.96600457','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Zamfara','state_code'=>'NG-ZA','latitude'=>'12.1704057','longitude'=>'6.659996296','timezone'=>'West Africa UTC+1'],

     	['country_id'=>'163','state'=>'Federal Capital Territory','state_code'=>'NG-FC','latitude'=>'9.083333149','longitude'=>'7.533328002','timezone'=>'West Africa UTC+1']

     ];

     DB::table('locations')->insert($locations);
    }
}
