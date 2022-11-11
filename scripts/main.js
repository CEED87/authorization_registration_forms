
const formAuth = document.querySelector('#authorization');
const formReg = document.querySelector('#register');
const btnReg = document.querySelector('#reg');
const btnAut = document.querySelector('#aut');


const checkLogin = (input) => {
    if (!/^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}$/.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Must be at least 6 characters";
        input.value = ''
    } else {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkPassword = (input) => {
    if (!/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Must be at least 6 characters and contain numbers and letters";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkPassConf = (input) => {
    const inputConf = input.previousElementSibling.previousElementSibling.previousElementSibling.value
    if (input.value !== inputConf || input.value === '') {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Password and confirmation password do not match";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkEmail = (input) => {
    if (!/.+@.+\..+/i.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Invalid email entered";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkName = (input) => {
    if (!/^[a-zA-Zа-яА-я]{3,16}$/.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Must be at least 2 characters and consist of letters";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

// Authorization form

if (formAuth){
    const checkInput = () => {
        btnAut.addEventListener('click', () => {
            const inputs = formAuth.querySelectorAll('input');

            inputs.forEach(input => {
                if (input.name === 'login') {
                    checkLogin(input)
                } else if (input.name === 'password') {
                    checkPassword(input)
                } 
            }) 
        })
    }

    checkInput();
}


// Registration form

if (formReg) {
    const checkInput = () => {
        btnReg.addEventListener('click', () => {
            const inputs = formReg.querySelectorAll('input');
            inputs.forEach(input => {
                if (input.name === 'login') {
                    checkLogin(input)
                } else if (input.name === 'password') {
                    checkPassword(input)
                } else if (input.name === 'password_confirm') {
                    checkPassConf(input)
                } else if (input.name === 'email') {
                    checkEmail(input)
                } else if (input.name === 'full_name') {
                    checkName(input)
                }
            })  
        })
    }
    
    checkInput()
}





