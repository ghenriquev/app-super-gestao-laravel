{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input class="{{ $corDaBorda }}" name="nome" placeholder="Nome" type="text">
    <br>
    <input class="{{ $corDaBorda }}" name="telefone" placeholder="Telefone" type="text">
    <br>
    <input class="{{ $corDaBorda }}" name="email" placeholder="E-mail" type="text">
    <br>
    <select class="{{ $corDaBorda }}" name="motivo_contato">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea class="{{ $corDaBorda }}" name="mensagem" placeholder="Preencha aqui a sua mensagem"></textarea>
    <br>
    <button class="{{ $corDaBorda }}" type="submit">ENVIAR</button>
</form>
