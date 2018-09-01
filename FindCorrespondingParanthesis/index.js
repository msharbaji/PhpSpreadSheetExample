function findClosingParenthesis(str, index) {
  if (str[index] != '(') {
    console.log('No open parenthesis "(" at index');
	return -1;
  }
  let stack = 1;
  for (let i = index + 1; i < str.length; i++) {
    if(str[i] === '('){
		stack++;
	}
	else if (str[i] === ')'){
		if(--stack === 0){
			return i;
		}
	}
	else
		continue;
  }
  return -1;
}

console.log(findClosingParenthesis('a (b c (d e (f) g) h) i (j k)', 2)); // 20

