<?php

namespace src\class\otherClass;
/**
 * class form
 * permet de générer un formulaire
 */
class Form
{ 
    /**
     * @var array données utilisée par le formulaire
     */
    private $data;
    /**
     * @var string  $data données à utiliser pour construire le formulaire
     */
    public $surrond ='div';
    /**
     * @var string 
     */
    public $surrondDiv = 'p';
    /**
     * @param array $data 
     */
    public function __construct($data=array())
    {
        $this->data = $data;
    }
    /**
     * @param $html code html a entourer
     * @return string
     */
    private function surrond($html){
        return "<{$this->surrond}>$html</{$this->surrond}>";
    }
    /**
     * 
     */
    private function surrond2($html){
        return "<{$this->surrond}>$html</{$this->surrond}>";
    }
    
    /**
     * @param $index string
     * @return string
     */
    private function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
 /**
     * @param $type string dertermine le type de l'input
     * @param $label string afficher dans le label
     * @param $name string nom de l'input
     * @param $id string nome l'id de l'input
     * @param $msgLabel string nom passer dans le label 
     * @return string
     */
    public function inputText( $error, $name, $id, $msgLabel){

       return $this->surrond( '<label for="'.$id.'">'.$msgLabel.' :  </label>'
       . '<input type="text" id="'.$id.'" value="'.$this->getValue($name).'" name="'.$name.'" required>'
    );
    }
    
 /**
     *input type email    
     * @param $type string dertermine le type de l'input
     * @param $label string afficher dans le label
     * @param $name string nom de l'input
     * @param $id string nome l'id de l'input
     * @param $msgLabel string nom passer dans le label 
     * @return string
     */
    public function inputemail( $error, $name, $id, $msgLabel){

        return $this->surrond( '<label for="'.$id.'">'.$msgLabel.': </label>'
        . '<input type="email" id="'.$id.'" value="'.$this->getValue($name).'" name="'.$name.'" required> <br/>'
        . '<p class="text-danger" id="Error'.$error.'"><?= isset($formError['.$error.']) ? $formError['.$error.'] : \'\' ?></p>'
     );
     }
    
 /**
     * @param $type string dertermine le type de l'input
     * @param $label string afficher dans le label
     * @param $name string nom de l'input
     * @param $id string nome l'id de l'input
     * @param $msgLabel string nom passer dans le label 
     * @return string
     */
    public function inputPwd( $error, $name, $id, $msgLabel){

        return $this->surrond( '<label for="'.$id.'">'.$msgLabel.' : </label>'
        . '<input type="password" id="'.$id.'" value="'.$this->getValue($name).'" name="'.$name.'" required>'
        . '<p class="text-danger" id="Error'.$error.'"><?= isset($formError['.$error.']) ? $formError['.$error.'] : \'\' ?></p>'
     );
     }
     /**
      * @param string $value string valeur de l'input submit 
      * @var $id string valeur de l'id l'input submit 
      * @var $name string  name l'input submit     
     * @return string
     */
    public function submit($valus, $id, $name){
        return $this->surrond( '<input type="submit" name="'.$name.'" id="'.$id.'" value="'.$valus.'">');
    }
    /**
     * @var $name string valeur du name de l'input
     * @var $id string valeur de l'id de l'input
     * @return string
     */
    public function date( $name, $id, $msgLabel){
        return $this->surrond('<label for"'.$id.'">'.$msgLabel.': </label> '
        .'<input type="date" name="'.$name.'" id="'.$id.'" required>');
    }
    /**
     * @var string $error nom de l'erreur
     */
    public function error($error){
        return $this->surrond('<p class="text-danger" id="Error'.$error.'"><?= isset($formError['.$error.']) ? $formError['.$error.'] : \'\' ?></p>');
    }
    public function checkbox($id, $msgLabel){
        return $this->surrond('<label for"'.$id.'">'.$msgLabel.': </label> '
        .'<input type="checkbox" id="'.$id.'">');
    }
} 
