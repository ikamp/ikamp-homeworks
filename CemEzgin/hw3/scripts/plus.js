var Plus = function(firstNumber,lastNumber){
	this.firstNumber = firstNumber;
	this.lastNumber = lastNumber;
}
Plus.prototype.answer = function(){
	var answer = parseFloat(this.firstNumber) + parseFloat(this.lastNumber);
	document.getElementById('display').innerHTML="";
	return buttonClick(answer);
}