# FindCorrespondingParenthesis
Function to find closing parenthesis of a corresponding position of an opening parenthesis. For this problem, the stacks are the appropriate data structure for keeping the parentheses and the clue of this you can see in an example closing symbols match opening symbols in the reverse order of their appearance; they match from the inside out.
here is the funcion
<script async src="//jsfiddle.net/msharbaji/2ran35om/1/embed/js/"></script>
The statement of the algorithm is straightforward. Starting with an empty stack, process the parenthesis strings from left to right. If a symbol is an opening parenthesis, push it on the stack as a signal that a corresponding closing symbol needs to appear later. If, on the other hand, a symbol is a closing parenthesis, pop the stack.
