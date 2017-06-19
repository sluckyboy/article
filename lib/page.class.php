<?php 
    class page{
        private $total;
        private $pagesize;
        private $current;
        private $pagenum;
        
        public function __construct($total, $pagesize, $current){
            $this->total = $total;
            $this->pagesize = $pagesize;
            $this->current = $current;
            $this->pagenum = ceil($this->total / $this->pagesize);
        }
        
        //获取SQL中的limit条件
        public function getLimit(){
            $lim = ($this->current - 1) * $this->pagesize;
            return $lim.','.$this->pagesize;
        }
        
        //获取URL参数，用于再生成分页链接时保存原有的GET参数
        private function getUrlParams(){
            $p = array();
            unset($_GET['page']);
            foreach($_GET as $k=>$v){
                $p[] = "$k=$v";
            }
            echo "hello page1"."</br>";
            var_dump($p);
            return $p;
        }
        
        //获取分页连接
        public function showPage(){
            if($this->pagenum<=1) return '';         //如果少于一夜则不现实分页导航
            $url = $this->getUrlParams();         //获取原来的GET参数
            //拼接URL参数
            $url = '?'.implode('&',$url).'&page=';
            $first = '<a href="'.$url.'1">[首页]</a>';      //拼接首页
            $prev = ($this->current == 1) ? '[上一页]' : '<a href="'.$url.($this->current-1).'">[上一页]</a>';
            $next = ($this->current == $this->pagenum) ? '[下一页]' : '<a href="'.$url.($this->current+1).'">[下一页]</a>';
            $last = '<a href="'.$url.$this->pagenum.'">[尾页]</a>';
            //组合最终样式
            return "当前为 {$this->current}/{$this->pagenum}  {$first} {$prev} {$next} {$last}";
        }
    }
       
?>