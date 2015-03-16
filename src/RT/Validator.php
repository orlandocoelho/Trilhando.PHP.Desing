<?php
/**
 * Created by PhpStorm.
 * User: Orlando
 * Date: 03/02/2015
 * Time: 15:36
 */

namespace RT;

use RT\Interfaces\InterfaceValidator;

class Validator implements InterfaceValidator
{
    private $request;
    private $rules = [];
    private $messages = [];
    private $fieldError = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validate()
    {
        if(count($this->rules) == 0)
            throw new \InvalidArgumentException('Nenhuma regra de validação foi recebida');

        foreach($this->rules as $arrayRules){
            $element = $arrayRules['element'];
            $rules = $arrayRules['rules'];

            foreach($rules as $rule){
                if(isset($rule['params']))
                    $this->$rule['rule']($element, $rule['params']);
                else
                    $this->$rule['rule']($element);
            }

        }
    }

    public function addRule(Array $rule)
    {
        $this->rules[] = $rule;
    }

    /**
     * @return array
     */
    public function getMessages($openTag = '<li>', $closeTag = '</li>')
    {
        if(count($this->messages) == 0)
            return null;

        $listMessages = "";
        foreach($this->messages as $message){
            echo "<ul>";
            $listMessages.= $openTag . $message . $closeTag;
            echo "</ul>";
        }

        return $listMessages;
    }

    public function getArrayMeasages()
    {
        return $this->messages;
    }

    /**
     * @return array
     */
    public function getFieldError()
    {
        return $this->fieldError;
    }

    public function is_required($target)
    {
        if(!$target->getValue() != ''){
            $this->fieldError[] = $target;
            $this->messages[] = "O Campo {$target->getName()} é obrigatório!";
            return false;
        }
            return true;
    }

    protected function is_numeric($target)
    {
        if (!is_numeric($target->getValue())){
            $this->fieldError[] = $target;
            $this->messages[] = "O Campo {$target->getName()} deve ser numérico!";
            return false;
        }
        return true;
    }

    protected function max_length($target, $params)
    {
        if (strlen($target->getValue()) <= $params['max']){
            return true;
        }
        $this->messages[] = "O Campo {$target->getName()} deve ter no máximo {$params['max']} caracteres!";
        $this->fieldError[] = $target;
        return false;
    }

}