<?php
	require_once(__DIR__ . "/Config.inc.php");
	
	abstract class HtmlElement{
		protected $element;
		protected $htmlClass;
		protected $htmlId;
		protected $style;
		public $Contents;
	
		protected function Element(){
			if (func_num_args() == 1){
				$this->element = func_get_arg(0);
				return;
				} else {
				return $this->element;
				}
			}
			
		public function ClassAttr(){
			if (func_num_args() == 1){
				$this->htmlClass = func_get_arg(0);
				return;
				} else {
				return $this->htmlClass;
				}
			}
			
		public function Id(){
			if (func_num_args() == 1){
				$this->htmlId = func_get_arg(0);
				return;
				} else {
				return $this->htmlId;
				}
			}
			
		public function Style(){
			if (func_num_args() == 1){
				$this->style = func_get_arg(0);
				return;
				} else {
				return $this->style;
				}
			}
			
			
		protected function CommonAttrString(){
			$htmlCode = "";
			
			if ($this->Id()){
				$htmlCode .= " ID=\"" . $this->Id() . "\"";
				}
			
			if ($this->ClassAttr()){
				$htmlCode .= " CLASS=\"" . $this->ClassAttr() . "\"";
				}
				
			if ($this->Style()){
				$htmlCode .= " STYLE=\"" . $this->Style() . "\"";
				}

			return $htmlCode;
			}
			
		abstract public function GenerateHtml();
		
		public function ClosingTag(){
			return "</" . $this->Element() . ">";
			}
		}
		
	class FormElement extends HtmlElement{
		protected $formAction;
		protected $formMethod;
		
		function __construct($action, $method = "POST"){
			$this->Element("FORM");
			
			$this->Action($action);
			$this->Method($method);
			}
			
		public function Action(){
			if (func_num_args() == 1){
				$this->formAction = func_get_arg(0);
				return;
				} else {
				return $this->formAction;
				}
			}
			
		public function Method(){
			if (func_num_args() == 1){
				$this->formMethod = func_get_arg(0);
				return;
				} else {
				return $this->formMethod;
				}
			}
			
		public function GenerateHtml(){
			$htmlCode = "<" . $this->Element();
			$htmlCode .= " ACTION=\"" . $this->Action() . "\"";
			$htmlCode .= " METHOD=\"" . $this->Method() . "\"";
			$htmlCode .= $this->CommonAttrString();
			$htmlCode .= ">";
			
			return $htmlCode;
			}
		}
		
	class InputElement extends HtmlElement{
		protected $inputName;
		protected $inputValue;
		protected $inputType;
		
		function __construct(){
			$this->Element("INPUT");
			
			if (func_num_args() >= 1){
				$this->InputType(func_get_arg(0));
				}
				
			if (func_num_args() >= 2){
				$this->InputName(func_get_arg(1));
				}
				
			if (func_num_args() >= 3){
				$this->InputValue(func_get_arg(2));
				}
				
			return;
			}
			
		public function InputType(){
			if (func_num_args() == 1){
				$this->inputType = func_get_arg(0);
				return;
				} else {
				return $this->inputType;
				}
			}
			
		public function InputName(){
			if (func_num_args() == 1){
				$this->inputName = func_get_arg(0);
				return;
				} else {
				return $this->inputName;
				}
			}
			
		public function InputValue(){
			if (func_num_args() == 1){
				$this->inputValue = func_get_arg(0);
				return;
				} else {
				return $this->inputValue;
				}
			}
			
		public function GenerateHtml(){
			$htmlCode = "<" . $this->Element();
			if ($this->InputType()){
				$htmlCode .= " TYPE=\"" . $this->InputType() . "\"";
				}
			
			if ($this->InputName()){
				$htmlCode .= " NAME=\"" . $this->InputName() . "\"";
				}
				
			if ($this->InputValue()){
				$htmlCode .= " VALUE=\"" . $this->InputValue() . "\"";
				}
				
			$htmlCode .= $this->CommonAttrString();
			$htmlCode .= ">";
			
			return $htmlCode;
			}
		}
		
	class HiddenInputElement extends InputElement{
		function __construct(){
			$numArgs = func_num_args();
			
			switch($numArgs){
				case 0:
					parent::__construct("HIDDEN");
					break;
				case 1:
					parent::__construct("HIDDEN", func_get_arg(0));
					break;
				case 2:
					parent::__construct("HIDDEN", func_get_arg(0), func_get_arg(1));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
			
			return;
			}
		}
		
	class TextInputElement extends InputElement{
		function __construct(){
			$numArgs = func_num_args();
			
			switch($numArgs){
				case 0:
					parent::__construct("TEXT");
					break;
				case 1:
					parent::__construct("TEXT", func_get_arg(0));
					break;
				case 2:
					parent::__construct("TEXT", func_get_arg(0), func_get_arg(1));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
			
			return;
			}
		}
		
	class PasswordInputElement extends InputElement{
		function __construct(){
			$numArgs = func_num_args();
			
			switch($numArgs){
				case 0:
					parent::__construct("PASSWORD");
					break;
				case 1:
					parent::__construct("PASSWORD", func_get_arg(0));
					break;
				case 2:
					parent::__construct("PASSWORD", func_get_arg(0), func_get_arg(1));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
			
			return;
			}
		}
		
	class SubmitButtonElement extends InputElement{
		function __construct(){
			$numArgs = func_num_args();
			
			switch($numArgs){
				case 0:
					parent::__construct("SUBMIT");
					break;
				case 1:
					parent::__construct("SUBMIT", func_get_arg(0));
					break;
				case 2:
					parent::__construct("SUBMIT", func_get_arg(0), func_get_arg(1));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
			
			return;
			}
		}
		
	class ResetButtonElement extends InputElement{
		function __construct(){
			$numArgs = func_num_args();
			
			switch($numArgs){
				case 0:
					parent::__construct("RESET");
					break;
				case 1:
					parent::__construct("RESET", func_get_arg(0));
					break;
				case 2:
					parent::__construct("RESET", func_get_arg(0), func_get_arg(1));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
			
			return;
			}
		}
		
	class SelectElement extends HtmlElement{
		protected $selectName;
		
		function __construct(){
			$this->Element("SELECT");
			
			$numArgs = func_num_args();
			
			switch($numArgs){
				case 0:
					break;
				case 1:
					$this->SelectName(func_get_arg(0));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
			}
			
		public function SelectName(){
			if (func_num_args() == 1){
				$this->selectName = func_get_arg(0);
				return;
				} else {
				return $this->selectName;
				}
			}
			
		public function GenerateHtml(){
			$htmlCode = "<" . $this->Element();
			if ($this->SelectName()){
				$htmlCode .= " NAME=\"" . $this->SelectName() . "\"";
				}
				
			$htmlCode .= $this->CommonAttrString();
			$htmlCode .= ">";
			return $htmlCode;
			}
		}
		
	class OptionElement extends HtmlElement{
		protected $OptionValue;
		
		function __construct(){
			$this->Element("OPTION");
			$numArgs = func_num_args();
			
			switch ($numArgs){
				case 0:
					break;
				case 1:
					$this->OptionValue(func_get_arg(0));
					break;
				default:
					throw new Exception(E_TOO_MANY_ARGS, "too many arguments");
					break;
				}
				
			return;
			}
			
		public function OptionValue(){
			if (func_num_args() == 1){
				$this->OptionValue = func_get_arg(0);
				return;
				} else {
				return $this->OptionValue;
				}
			}
			
		public function GenerateHtml(){
			$htmlCode = "<" . $this->Element();
			if ($this->OptionValue()){
				$htmlCode .= " VALUE=\"" . $this->OptionValue() . "\"";
				}
				
			$htmlCode .= $this->CommonAttrString();
			$htmlCode .= ">";
			return $htmlCode;
			}
		}
		
	class LabelElement extends HtmlElement{
		protected $fieldFor;
		
		function __construct(){
			$this->Element("LABEL");
			
			if (func_num_args() == 1){
				$this->FieldFor(func_get_arg(0));
				}
			
			return;
			}
			
		public function FieldFor(){
			if (func_num_args() == 1){
				$this->fieldFor = func_get_arg(0);
				return;
				} else {
				return $this->fieldFor;
				}
			}
			
		public function GenerateHtml(){
			$htmlCode = "<" . $this->Element();
			
			if ($this->FieldFor()){
				$htmlCode.= " FOR=\"" . $this->FieldFor() . "\"";
				}
				
			$htmlCode .= $this->CommonAttrString();
				
			$htmlCode .= ">";
			
			return $htmlCode;
			}
		}
		
?>