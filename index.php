<?php
    require_once 'links.php';
    $links = new Links();
?>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
    html, body {
      width: auto !important;
    }
  </style>
  
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>

  <script>
    function validaLogin(){
      var dados = $("#div_login").find("input").serialize();
      $.ajax({
        url : "source/valida.php",
        data: dados,
        method :"POST",
          success : function(data){						
            if(data == "1"){
              window.location = "dashboard.php?loginSucesso=sucesso";
            }else if(data == "0"){
              $.uiAlert({
                textHead: "Usuario ou Senha Incorretos!", // header
                text: 'Verifique se Digitou Corretamente', // Text
                bgcolor: '#DB2828', // background-color
                textcolor: '#fff', // color
                position: 'top-left',// position . top And bottom ||  left / center / right
                icon: 'remove circle', // icon in semantic-UI
                time: 3, // time
              })
            }else{
              $.uiAlert({
                textHead: "Falta de Dados!", // header
                text: 'Verifique se Digitou Todos os Campos', // Text
                bgcolor: '#F2711C', // background-color
                textcolor: '#fff', // color
                position: 'top-left',// position . top And bottom ||  left / center / right
                icon: 'warning sign', // icon in semantic-UI
                time: 3, // time
              })
            }
          },
        })
      
    }
  </script>

</head>
<body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal header">
      <div class="content">
        Sistema de Gerenciamento
      </div>
    </h2>

    <div class="ui large form" id="div_login">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="nome" placeholder="Digte Seu Usuario">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="senha" placeholder="Senha">
          </div>
        </div>
        <input type="button" name="enviar" value="Login" id="enviar" onclick="validaLogin()" class="ui fluid large teal submit button">
      </div>

      <div class="ui error message"></div>
    </div>

    <div class="ui message">
      <a href="cadastrar.php">Cadastrar Novo Funcionario</a>
    </div>
  </div>
</div>



</body>

</html>
