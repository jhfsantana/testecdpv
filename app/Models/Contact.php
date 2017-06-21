<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = array(
					'first_name',
					'last_name',
					'email',
					'date',
					'job',
					'company',
					'phone',
					'cellphone',
					'neighborhood',
					'city',
					'state',
					'obs');

    public static function getNextBirthday()
    {	
    	$query = 'SELECT first_name, last_name, DATE_FORMAT(date, "%d %m %Y") as date
				   FROM  contacts 
				 WHERE  DATE_ADD(date, 
		            INTERVAL YEAR(CURDATE())-YEAR(date)
		                     + IF(DAYOFYEAR(CURDATE()) >= DAYOFYEAR(date),1,0)
		            YEAR)  
		        BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY);';

    	$days = DB::select($query);
    	//dd($days);
    	return $days;
    }
}
