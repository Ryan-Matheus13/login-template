let resultado = document.querySelector(".resultado")
let terms = $(".terms")
let elementos = {
    email: $(".email"),
    senha: $(".senha"),
    confirmaSenha: $(".confirma-senha"),
    nickname: $(".nickname")
}

$("#enviar").click((e) => {
    e.preventDefault()

    if (validarCampo(elementos)) {
        let dados = {
            email: elementos.email.val(),
            senha: elementos.senha.val(),
            nickname: elementos.nickname.val()
        }
        
        $.post("http://projetos/login-template/server/inserir.php", dados, function(result, status){
            if(result == "liberado"){
                window.location.href = "http://projetos/login-template/congratulation.html"
            } else {
                resultado.innerHTML = result
            }
            
            console.log(status)
        })
    } else {
        console.log("dados não enviados!")
    }
    
})

function validarCampo(obj) {
    let validado

    if(validarCampoVazio(obj) && validarEmail() && validarSenha(obj) && validarTerms()) {
        validado = true
    }
    
    return validado
}

function validarCampoVazio(obj) {
    let continua
    for (let item in obj) {
        let elem = document.querySelector(`.${obj[item].prop("class")}`)
        if (obj[item].val() == "") {
            resultado.innerHTML = "Preencha o(s) campo(s) acima corretamente!"
            elem.style.border = "1px solid red"
            continua = false
            
        } else {
            elem.style.border = "none"
            resultado.innerHTML = ""
            continua = true
        }
    }

    return continua
}

function validarSenha(obj) {
    let continua
    let elemSenha = document.querySelector(`.${obj["senha"].prop("class")}`)
    let elemConfirmaSenha = document.querySelector(`.${obj["confirmaSenha"].prop("class")}`)

    if (obj["senha"].val() != obj["confirmaSenha"].val() ) {
        elemSenha.style.border = "1px solid red"
        elemConfirmaSenha.style.border = "1px solid red"
        resultado.innerHTML = "As senhas não são iguais!"
        continua = false
    } else {
        elemSenha.style.border = "none"
        elemConfirmaSenha.style.border = "none"
        resultado.innerHTML = ""
        continua = true
    }

    return continua
}

function validarTerms() {
    let continua;
    let checkbox = document.querySelector(".terms")
    if(checkbox.checked) {
        continua = true
    } else {
        resultado.innerHTML = "Aceite os termos para continuar!"
        continua = false
    }

    return continua
}

function validarEmail() {
    let continua
    let elem = document.querySelector(".email")
    if(elem.value.indexOf("@") == -1) {
        resultado.innerHTML = "Insira um email válido!"
        elem.style.border = "1px solid red"
        continua = false
    } else {
        continua = true
    }

    return continua
}