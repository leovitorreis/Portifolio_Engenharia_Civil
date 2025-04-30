<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário com validação básica
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    if (!$nome || !$email || !$mensagem) {
        echo "Por favor, preencha todos os campos corretamente.";
        exit;
    }

    // E-mail do responsável
    $emailResponsavel = "leovitorreis@email.com";

    // Assunto do e-mail
    $assunto = "Novo contato de $nome";

    // Corpo do e-mail
    $corpo = "Você recebeu uma nova mensagem:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos do e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($emailResponsavel, $assunto, $corpo, $headers)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Falha ao enviar o e-mail. Verifique a configuração do servidor.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>