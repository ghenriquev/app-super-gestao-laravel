<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Document</title>
    </head>
    <h3>Fornecedor (view)</h3>

    <body>

        @php
            /*
            if(empty($variavel)) {} // Retornar true se a variável estiver vazia
            */
        @endphp

        @isset($fornecedores)
            @forelse ($fornecedores as $fornecedor)
                Iteração atual: {{ $loop->iteration }}
                <br>

                Total de fornecedores: {{ $loop->count }}
                <br>

                Índice atual: {{ $loop->index }}
                <br>

                Fornecedores restantes: {{ $loop->remaining }}
                <br>

                @if ($loop->first)
                    Este é o primeiro fornecedor.
                    <br>
                @endif

                @if ($loop->last)
                    Este é o último fornecedor.
                    <br>
                @endif

                <p>---------------------------------------</p>
                Fornecedor: {{ $fornecedor['nome'] }}
                <br>
                Status: {{ $fornecedor['status'] }}
                <br>
                CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
                <br>
                Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
                <br>
                <hr>
            @empty
                <p>Não existem fornecedores cadastrados.</p>
            @endforelse
        @endisset

    </body>

</html>
