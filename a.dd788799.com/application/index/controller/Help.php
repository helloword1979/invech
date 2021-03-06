<?php

namespace app\index\controller;

use app\index\Base;
use app\common\model\Help as HelpModel;
use app\common\model\HelpCat as HelpCatModel;
use app\common\model\Type;

class Help extends Base
{   
    
   public function index(){
       $help_cat = HelpCatModel::allHelpCat();
       $lottery = Type::nameMaps();
       $this->assign('lottery',$lottery);
       $this->assign('help_cat',$help_cat);
       return $this->fetch();
   }
    
   public  function show($id=''){
        $help_cat = HelpCatModel::allHelpCat();
        if(!$id){
            $id = '8';
        }
        $lottery = Type::nameMaps();
        $help = HelpModel::get($id);
        $this->assign('lottery',$lottery);
        $this->assign('help_cat',$help_cat);
        $this->assign('id',$id);
        $this->assign('help',$help);
        return $this->fetch();
    }

}
