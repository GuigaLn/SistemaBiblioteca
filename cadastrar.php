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
    function cadastrar(){

      var dados = $("#div_login").find("input").serialize();
      $.ajax({
        url : "source/cadastrar.php",
        data: dados,
        method :"POST",
          success : function(data){					
            if(data == "2"){
              $.uiAlert({
                textHead: 'Cadastro Realizado Com Sucesso!', // header
                text: 'Bem-Vindo ao Sistema de Gerenciamento de Biblioteca', // Text
                bgcolor: '#19c3aa', // background-color
                textcolor: '#fff', // color
                position: 'top-left',// position . top And bottom ||  left / center / right
                icon: 'checkmark box', // icon in semantic-UI
                time: 3, // time
              })  
              //Passa Login=sucesso, para que no index, ele seja capturado e apresentar o alert Login
            }else if(data == "1"){
              $.uiAlert({
                textHead: "Usuario Ja Cadastrado!", // header
                text: 'Tente Outro Usuario', // Text
                bgcolor: '#DB2828', // background-color
                textcolor: '#fff', // color
                position: 'top-left',// position . top And bottom ||  left / center / right
                icon: 'remove circle', // icon in semantic-UI
                time: 3, // time
              })
            }else if(data == "0"){
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
    <h2 class="ui teal image header">
      <img src="assets/images/logo.png" class="image">
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
        <input type="button" name="enviar" value="Cadastrar" id="enviar" onclick="cadastrar()" class="ui fluid large teal submit button">
      </div>

      <div class="ui error message"></div>
    </div>

    <div class="ui message">
      <a href="index.php">Realizar Login</a>
    </div>
  </div>
</div>



</body>

</html>
