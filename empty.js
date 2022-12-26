let money = prompt('Ваш бюджет на месяц?', ''),
	 time  = prompt('Введите дату в формате YYYY-MM-DD', '');
	 
let appData = {
	budget            : money,
	timeData          : time,
	expenses          : '',
	optionalExpenses  : {},
	income            : [],
	savings           : false
};

let questionOne =    prompt("Введите обязательную статью расходов в этом месяце", ''),
	 questionTwo =    prompt("Во сколько обойдется?", ''),
	 questionThree =  prompt("Введите обязательную статью расходов в этом месяце", ''),
	 questionFour =   prompt("Во сколько обойдется?", '');
	 
appData.expenses.questionOne = questionTwo;
appData.expenses.questionThree = questionFour;

alert(appData.budget / 30);