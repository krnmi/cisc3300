function greetingFunc(name) {
    const greeting = `hi, ${name}!`;

    function showGreeting() {
        console.log(greeting);
    }

    return showGreeting;
}

const greetRonece = greetingFunc("Ronece");
greetRonece();

const greetJane = greetingFunc("Professor Hishon");
greetHishon();
