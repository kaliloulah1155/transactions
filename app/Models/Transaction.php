<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Transaction extends Model
{
    use HasFactory,Searchable;
    
    protected $fillable=[
         'title',
        'amount',
        'status',
        'date',
    ];
    
    /**
 * The attributes that should be mutated to dates.
 *
 * @var array
 */
protected $dates = ['date'];
    
    public function getStatusColorAttribute(){

             return [
                 
                'success'=>'green',
                'failed'=>'red'
             ][$this->status] ?? 'gray';
    }
    
    public function getDateForHumansAttribute(){
       return  $this->date->format('M, d Y') ?? now();
      }
    
    
    public function toSearchableArray(){
    
       return [
          'title'=>$this->title
       ];
    }
    
   
}
