<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\HelperFunc;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model
{

    const PER_PAGE = 20;

    /**
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * define column image, define in child class
     * @var string 
     */
    protected $columnImage;
    
    protected $fillable;
    
    /**
     * constructor
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        $this->fillable = Schema::getColumnListing($this->table);
        parent::__construct($attributes);
    }
    
    /**
     * Get table name of model
     *
     * @return string
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
    
    /**
     * list fillable columns
     * @return array
     */
    public static function arrayFillable() {
        return (new static())->getFillable();
    }
    
    /**
     * format original column
     * @param type $column
     */
    public static function isInFillable($column)
    {
        $splColumn = explode('.', $column);
        return in_array($splColumn[count($splColumn) - 1], self::arrayFillable());
    }

    /**
     * filter data collection
     * @param builder $collection
     * @param array $data
     */
    public static function filterData(&$collection, $data, $compare = 'like')
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $collection->whereIn($key, $value);
            } else {
                if ($compare === 'like') {
                    $value = "%$value%";
                }
                $collection->where($key, $compare, $value);
            }
        }
    }
    
    /**
     * get image src
     * @return string
     */
    public function getImageSrc($size = 'full', $default = false)
    {
        $path = $this->{$this->columnImage};
        return HelperFunc::getImageSrc($path, $size, $default);
    }
    
    /*
     * get image src by column
     * @return string
     */
    public function getImageSrcByCol($column, $size = 'full', $default = false)
    {
        $path = $this->{$column};
        return HelperFunc::getImageSrc($path, $size, $default);
    }
    
    /*
     * format show zip no
     */
    public function showZipNo($column = 'zip_no')
    {
        return substr($this->{$column}, 0, 3) . '-' . substr($this->{$column}, 3, strlen($this->{$column} ));
    }

}
