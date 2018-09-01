# FindCorrespondingParenthesis
Function to find closing parenthesis of a corresponding position of an opening parenthesis. For this problem, the stacks are the appropriate data structure for keeping the parentheses and the clue of this you can see in an example closing symbols match opening symbols in the reverse order of their appearance; they match from the inside out.
here is the funcion
```javascript
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

```
The statement of the algorithm is straightforward. Starting with an empty stack, process the parenthesis strings from left to right. If a symbol is an opening parenthesis, push it on the stack as a signal that a corresponding closing symbol needs to appear later. If, on the other hand, a symbol is a closing parenthesis, pop the stack.
