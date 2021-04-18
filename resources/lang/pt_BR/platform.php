<?php

 return [
    'generic'   =>  [
        'action'   => [
            'edit'          => 'editar',
            'delete'        =>  'remover',
            'submit'        =>  'enviar',
            'close'         =>  'fechar',
            'report'        =>  'relatório',
            'created_at'    =>  'criado em',
            'updated_at'    =>  'editado em',
        ],
        'message'  => [
            'index' => 'voltar para o início'
        ],
    ],
    'customer'  =>  [
        'new'   => 'inserir um novo cliente',
        'import'   => 'importar clientes',
        'report'   => 'relatório de clientes',
        'edit'  => 'editar cliente',
        'name'  =>  'Clientes',
        'form'  => [
            'name'      => 'nome',
            'email'     => 'e-mail',
            'cpf'       => 'CPF',
            'options'   => 'opções',
            'file'      => 'arquivo',
            'id'        => 'ID'
        ],
        'message' => [
            'no_data'   =>  'Não há nenhum registro de cliente, clique no botão "inserir novo cliente" para continuar.',
            'return'    =>  'voltar para todos os clientes',
            'delete'    =>  'confirma a remoção deste cliente?',
            'import'    =>  'verifique se as colunas "nome", "email" e "cpf" estão presentes na planilha com seus devidos dados.'
        ],
    ],
    'report'        =>  [
        'name'          =>  'relatórios',
        'singular_name' =>  'relatório',
        'type'  =>  [
            'customers' =>  'clientes',
        ],
        'message'    =>  [
            'generated_success' =>  'relatório gerado com sucesso!',
            'generated_error'   =>  'não foi possível gerar o relatório neste momento.',
            'realize_download'  =>  'realizar o download',
        ]
    ],
 ];



