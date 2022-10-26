<?php

require_once 'D:\xampp\htdocs\WEB2\TP_ESPECIAL_WEB\libs\smarty-4.2.1\libs\Smarty.class.php';

class ReviewView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }


    function showSeries($series,$bool) {
        $this->smarty->assign('reviews',count($series));
        $this->smarty->assign('series',$series);
        $this->smarty->assign('tituloPag',"Series");
        $this->smarty->assign('bool',$bool);

        $this->smarty->display('reviews.tpl');
    }
    function showEpisodios($episodios,$bool) {
        $this->smarty->assign('bool',$bool);
        if($episodios != null){
            $acordeon = ["One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten"];
    
            $this->smarty->assign('acordeon', $acordeon);
    
            $this->smarty->assign('titulo',$episodios[0]->Serie);
            $this->smarty->assign('tituloPag',$episodios[0]->Serie);
            $this->smarty->assign('episodios',$episodios);
            $this->smarty->assign('i',0);   
            $this->smarty->display('episodios.tpl');
        } else {
            $this->smarty->assign('tituloPag',"ERROR");
            $this->error("TODAVIA NO HAY EPISODIOS DE ESTA SERIE", $bool);
        }
    }

    function showAddSerie($bool) {
        $this->smarty->assign('tituloPag',"Agregar Serie");
        $this->smarty->assign('bool',$bool);

        $this->smarty->display('addSerie.tpl');
    }

    function showAddEpisodio($series, $bool) {
        $this->smarty->assign('series',$series);
        $this->smarty->assign('tituloPag',"Agregar Episodio");
        $this->smarty->assign('bool',$bool);

        $this->smarty->display('addEpisodio.tpl');
    }

    function editSerie($series, $bool) {
        $this->smarty->assign('tituloPag',"Editar Serie");
        $this->smarty->assign('series',$series);
        $this->smarty->assign('bool',$bool);

        $this->smarty->display('editSerie.tpl');
    }

    function error($error, $bool = null) {
        $this->smarty->assign('tituloPag',"ERROR");
        $this->smarty->assign('error',$error);
        $this->smarty->assign('bool',$bool);
        $this->smarty->display('error.tpl');
    }

    function showEditEpisodio($episodio, $bool) {
        $this->smarty->assign('tituloPag',"Editar Episodio");
        $this->smarty->assign('episodio',$episodio);
        $this->smarty->assign('bool',$bool);

        $this->smarty->assign('titulo',$episodio[0]->Titulo);
        $this->smarty->assign('duracion',$episodio[0]->Duracion);
        $this->smarty->assign('temporada',$episodio[0]->Temporada);
        $this->smarty->assign('descripcion',$episodio[0]->Descripcion);
        $this->smarty->assign('puntuacion',$episodio[0]->Puntuacion);
        $this->smarty->assign('idEp',$episodio[0]->ID_episodio);


        $this->smarty->display('editEpisodio.tpl');
    }
}