let resultado = document.querySelector(".resultado")
let elementos = {
    email: $(".email"),
    senha: $(".senha")
}

$("#enviar").click((e) => {
    e.preventDefault()

    if (validarCampoVazio(elementos) && validarEmail()) {
        let dados = {
            email: elementos.email.val(),
            senha: elementos.senha.val()
        }

        $.post("http://projetos/login-template/server/validar.php", dados, function(result, status){
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