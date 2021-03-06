<?php

namespace app\common\traits\model;

trait MyTable
{

    public static $lotterys = [
            'cqssc','tjssc','xjssc','gd11x5','fc3d','pl3',
            'jx11x5','gdklsf',//'cq11x5',重庆11选5,tx分分彩,没有商业接口
            'bjpk10','bjkl8','cqklsf','jsk3','mlaft',//mlaft幸运飞艇
            'xy28',//xy28和北京快乐8同步
            'hgssc',//韩国1.5分彩有商业接口
            'lg5fc','lg2fc','lg1fc',
            'txssc','djssc',//暂不开放
            'xg6hc',
        ];


    public static function uniqid(){
        $id_table = self::$id_table;
        $sql  = "insert into {$id_table} (id) values('')";  
        db()->query($sql);//db()->execute($sql);
        return db()->getLastInsID();
    }

    public static function create($data = [], $field = null)
    {
        $data['id'] = self::uniqid();
        return parent::create($data,$field);
    }

    //修改Model的save方法,更新或插入时,不创建新查询;
    public function save($data = [], $where = [], $sequence = null)
    {
        foreach ($data as $key => $value) {
            $this->setAttr($key, $value, $data);
        }

        $code = $this->getAttr('code');
        if(!in_array($code,self::$lotterys)){
            throw new \Exception('code not valid when save!');
        }
       
        $table = $this->prefix . '_' . $code;
        $this->setTable($table);
        $ret = parent::save();
        $this->setTable($this->table);
        return $ret;
/*
        $table = $this->prefix_db . '_' . $code;
        if($this->isUpdate){
            db($table)->insert($data);
        }else{
            db($table)->where()->update($data);
        }
*/        
    }
    
    public function delete(){

        $code = $this->getAttr('code');
        if(!in_array($code,self::$lotterys)){
            throw new \Exception('code not valid when save!');
        }
        $table = $this->prefix . '_' . $code;
        $this->setTable($table);
        $ret = parent::delete();        
        $this->setTable($this->table);
        return $ret;
    } 
}
