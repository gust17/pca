<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é uma URL válida.',
    'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O campo :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'O campo :attribute só pode conter letras.',
    'alpha_dash'           => 'O campo :attribute só pode conter letras, números e traços.',
    'alpha_num'            => 'O campo :attribute só pode conter letras e números.',
    'array'                => 'O campo :attribute deve ser uma matriz.',
    'before'               => 'O campo :attribute deve ser uma data anterior :date.',
    'before_or_equal'      => 'O campo :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve ser entre :min e :max.',
        'file'    => 'O campo :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve ser entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O campo :attribute de confirmação não confere.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_equals'          => 'O campo :attribute deve ser uma data igual a :date.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'Os campos :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O campo :attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => 'O campo :attribute tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute campo tem um valor duplicado.',
    'email'                => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'ends_with'            => 'O campo :attribute deve terminar com um dos seguintes: :values',
    'exists'               => 'O campo :attribute selecionado é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file'    => 'O campo :attribute deve ser maior que :value kilobytes.',
        'string'  => 'O campo :attribute deve ser maior que :value caracteres.',
        'array'   => 'O campo :attribute deve conter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file'    => 'O campo :attribute deve ser maior ou igual a :value kilobytes.',
        'string'  => 'O campo :attribute deve ser maior ou igual a :value caracteres.',
        'array'   => 'O campo :attribute deve conter :value itens ou mais.',
    ],
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O campo :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute deve ser um número inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço de IP válido.',
    'ipv4'                 => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O campo :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file'    => 'O campo :attribute deve ser menor que :value kilobytes.',
        'string'  => 'O campo :attribute deve ser menor que :value caracteres.',
        'array'   => 'O campo :attribute deve conter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file'    => 'O campo :attribute deve ser menor ou igual a :value kilobytes.',
        'string'  => 'O campo :attribute deve ser menor ou igual a :value caracteres.',
        'array'   => 'O campo :attribute não deve conter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O campo :attribute não pode ser superior a :max.',
        'file'    => 'O campo :attribute não pode ser superior a :max kilobytes.',
        'string'  => 'O campo :attribute não pode ser superior a :max caracteres.',
        'array'   => 'O campo :attribute não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O campo :attribute deve ser pelo menos :min.',
        'file'    => 'O campo :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'array'   => 'O campo :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O campo :attribute selecionado é inválido.',
    'multiple_of'          => 'O campo :attribute deve ser um múltiplo de :value.',
    'not_regex'            => 'O campo :attribute possui um formato inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'password'             => 'A senha está incorreta.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O campo :attribute tem um formato inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other for :value.',
    'required_unless'      => 'O campo :attribute é obrigatório exceto quando :other for :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'prohibited'           => 'O campo :attribute é proibido.',
    'prohibited_if'        => 'O campo :attribute é proibido quando :other for :value.',
    'prohibited_unless'    => 'O campo :attribute é proibido exceto quando :other for :values.',
    'same'                 => 'Os campos :attribute e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kilobytes.',
        'string'  => 'O campo :attribute deve ser :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'starts_with'          => 'O campo :attribute deve começar com um dos seguintes valores: :values',
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve ser uma zona válida.',
    'unique'               => 'O campo :attribute já está sendo utilizado.',
    'uploaded'             => 'Ocorreu uma falha no upload do campo :attribute.',
    'url'                  => 'O campo :attribute tem um formato inválido.',
    'uuid' => 'O campo :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address'   => 'endereço',
        'age'       => 'idade',
        'body'      => 'conteúdo',
        'cell'      => 'celular',
        'city'      => 'cidade',
        'country'   => 'país',
        'date'      => 'data',
        'day'       => 'dia',
        'excerpt'   => 'resumo',
        'first_name'=> 'primeiro nome',
        'gender'    => 'gênero',
        'hour'      => 'hora',
        'last_name' => 'sobrenome',
        'message'   => 'mensagem',
        'minute'    => 'minuto',
        'mobile'    => 'celular',
        'month'     => 'mês',

        'name'      => 'nome',
        'model.nome' => 'nome',
        'morto.nome' => 'nome',

        'neighborhood' => 'bairro',
        'number'    => 'número',
        'password'  => 'senha',

        'phone'     => 'telefone',
        'model.numero_telefone' => 'telefone',

        'model.numero_celular' => 'número de celular',

        'second'    => 'segundo',
        'sex'       => 'sexo',
        'state'     => 'estado',
        'street'    => 'rua',
        'subject'   => 'assunto',
        'text'      => 'texto',
        'time'      => 'hora',
        'title'     => 'título',
        'username'  => 'usuário',
        'year'      => 'ano',
        'description' => 'descrição',
        'password_confirmation' => 'confirmação da senha',
        'current_password' => 'senha atual',

        'model.cartao_sus' => 'cartão sus',
        'model.nome_pai' => 'nome pai',
        'model.sigla' => 'sigla',
        'model.cpf' => 'CPF',
        'model.rg' => 'RG',
        'model.email' => 'email',
        'model.nacionalidade' => 'nacionalidade',
        'model.instituicao' => 'instituição',
        'model.matricula' => 'matrícula',
        'model.orientacao_sexual' => 'orientação sexual',
        'model.data_nascimento' => 'data de nascimento',
        'model.cor' => 'cor/etnia',
        'model.naturalidade' => 'naturalidade',
        'model.estado_civil' => 'estado civil',
        'model.lotacao' => 'lotação',
        'model.grupo_trabalho' => 'grupo de trabalho',
        'model.nome_representante' => 'nome representante',
        'model.area_atuacao' => 'área de atuação',
        'model.formacao_profissional' => 'formação profissional',
        'model.endereco.tipo_endereco' => 'tipo de endereço',
        'model.endereco.cep' => 'cep do endereço',
        'model.endereco.logradouro' => 'logradouro do endereço',
        'model.endereco.numero' => 'número do endereço',
        'model.endereco.complemento' => 'complemento do endereço',
        'model.endereco.bairro' => 'bairro do endereço',
        'model.endereco.cidade' => 'cidade do endereço',
        'model.foto' => 'foto',
        'model.hora_nascimento' => 'hora nascimento',
        'model.tipo_sanguineo' => 'tipo sanguineo',
        'model.altura' => 'altura',
        'model.biotipo' => 'biotipo',
        'model.cor_olho' => 'cor olhos',
        'model.tipo_cabelo' => 'cabelo',
        'model.cor_cabelo' => 'cor cabelo',
        'model.marca_cicatriz' => 'marca cicatriz',
        'model.escolaridade' => 'escolaridade',
        'model.ocupacao' => 'ocupação',
        'model.codigo_cbo' => 'código cbo',
        'model.endereco' => 'endereço',
        'model.documentacao' => 'documentação',
        'model.nome_mae' => 'nome mãe',

        'morto.tipo_obito' => 'tipo óbito',
        'morto.data_obito' => 'data óbito',
        'morto.naturalidade' => 'naturalidade',
        'morto.nome_mae' => 'nome mãe',
        'morto.data_nascimento' => 'data nascimento',
        'morto.sexo' => 'sexo',
        'morto.cor' => 'cor/raça',
        'morto.estado_civil' => 'estado civil',
        'morto.endereco.logradouro' => 'logradouro',
        'morto.endereco.numero' => 'número',
        'morto.endereco.cep' => 'cep',
        'morto.endereco.bairro' => 'bairro',
        'morto.endereco.cidade' => 'cidade',
        

        'ocorrencia.local' => 'local',
        'ocorrencia.estabelecimento' => 'estabelecimento',
        'ocorrencia.codigo_cnes' =>  'codigo cnes',
        'ocorrencia.endereco.logradouro' => 'logradouro',
        'ocorrencia.endereco.numero' => 'numero',
        'ocorrencia.endereco.cep' => 'cep',
        'ocorrencia.endereco.bairro' => 'bairro',
        'ocorrencia.endereco.cidade' => 'cidade',


        'causa_obito.data_entrada_dml' => 'data entrada dml',
        'causa_obito.hora_entrada_dml' => 'hora entrada dml',
        'causa_obito.data_obito' => 'data obito',
        'causa_obito.hora_obito' => 'hora obito',
        'causa_obito.natureza_obito' => 'natureza obito',
        // 'objeto_causa_obito' => '',
        // 'obito_mulher_idade_fertil' => '',
        // 'obito_mulher_idade_fertil_momento' => '',
        // 'assistencia_durante_doenca' => '',
        // 'diagnostico_confirmado_necropsia' => '',

        'medico.nome' => 'nome',
        'medico.crm' => 'crm',

    ],

];
