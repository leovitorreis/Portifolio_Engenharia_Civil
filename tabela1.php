<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    
    // Carregar o arquivo HTML da tabela
    $tabela = file_get_contents('teste.html');

    // Configurar o corpo do e-mail
    $to = "emaildoprofissional@dominio.com";
    $subject = "Serviços solicitados";
    $body = "
    <html>
    <head>
        <title>Serviços</title>
    </head>
    <body>
        <p>Nome: $nome</p>
        <p>Email: $email</p>
        <h3>Serviços:</h3>
        $tabela
    </body>
    </html>";
    
    // Configurar os headers para envio em HTML
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: webmaster@seusite.com";

    // Enviar o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Formulário enviado com sucesso com os serviços!";
    } else {
        echo "Erro ao enviar o formulário.";
    }
}
?>