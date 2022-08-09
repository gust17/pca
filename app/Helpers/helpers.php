<?php
if (! function_exists('uploadImg')) {
    function uploadImg($file, $path)
    {
        $imageName = $file->getClientOriginalName() . time().'.'.$file->extension();  

        $file->move(public_path($path), $imageName);

        $fullName = $path . '/' . $imageName;
        
        return $fullName;
    }
}

if (! function_exists('removeImg')) {
    function removeImg($fullName)
    {
        unlink($fullName);

        return true;
    }
}

if (! function_exists('formatDate')) {
    function formatDate($date, $pattern)
    {
        return date($pattern, strtotime($date));
    }
}

if (! function_exists('getEscolaridade')) {
    function getEscolaridade($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Sem escolaridade', 'value' => 'sem-escolaridade' ],
            [ 'text' => 'Fundamental I', 'value' => 'fundamental-i' ],
            [ 'text' => 'Fundamental II', 'value' => 'fundamental-ii' ],
            [ 'text' => 'Superior Incompleto', 'value' => 'superior-incompleto' ],
            [ 'text' => 'Superior completo', 'value' => 'superior-completo' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getEstadoCivil')) {
    function getEstadoCivil($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Solteiro(a)', 'value' => 'solteiro' ],
            [ 'text' => 'Casado(a)', 'value' => 'casado' ],
            [ 'text' => 'Separado(a)', 'value' => 'separado' ],
            [ 'text' => 'Divorciado(a)', 'value' => 'divorciado' ],
            [ 'text' => 'Viúvo(a)', 'value' => 'viuvo' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getFormacaoProfissional')) {
    function getFormacaoProfissional($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Bacharelado', 'value' => 'bacharelado' ],
            [ 'text' => 'Licenciatura', 'value' => 'licenciatura' ],
            [ 'text' => 'Tecnológico', 'value' => 'tecnologico' ],
            [ 'text' => 'Seqüencial', 'value' => 'sequencial' ],
            [ 'text' => 'Graduação Modulada', 'value' => 'graduacao-modulada' ],
            [ 'text' => 'Educação à Distância', 'value' => 'ead' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoEndereco')) {
    function getTipoEndereco($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Via pública', 'value' => 'via-publica' ],
            [ 'text' => 'Endereço de Residência', 'value' => 'endereco-de-residencia' ],
            [ 'text' => 'Estabelecimento comercial', 'value' => 'estabelecimento-comercial' ],
            [ 'text' => 'Outro domicílio', 'value' => 'outro-domicilio' ],
            [ 'text' => 'Outro', 'value' => 'outro' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCidade')) {
    function getCidade($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Amapá', 'value' => 'amapa' ],
            [ 'text' => 'Calçoene', 'value' => 'calcoene' ],
            [ 'text' => 'Cutias', 'value' => 'cutias' ],
            [ 'text' => 'Ferreira Gomes', 'value' => 'ferreira-gomes' ],
            [ 'text' => 'Itaubal', 'value' => 'itaubal' ],
            [ 'text' => 'Laranjal do Jarí', 'value' => 'laranjal-do-jari' ],
            [ 'text' => 'Macapá', 'value' => 'macapa' ],
            [ 'text' => 'Mazagão', 'value' => 'mazagao' ],
            [ 'text' => 'Oiapoque', 'value' => 'oiapoque' ],
            [ 'text' => 'Pedra Branca do Amapari', 'value' => 'pedra-branca do-amapari' ],
            [ 'text' => 'Porto Grande', 'value' => 'porto-grande' ],
            [ 'text' => 'Pracuúba', 'value' => 'pracuuba' ],
            [ 'text' => 'Santana', 'value' => 'santana' ],
            [ 'text' => 'Serra do Navio', 'value' => 'serra-do-navio' ],
            [ 'text' => 'Tartarugalzinho', 'value' => 'tartarugalzinho' ],
            [ 'text' => 'Vitória do Jari', 'value' => 'vitoria-do-jari' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getUF')) {
    function getUF($selectedOption=null)
    {
        $options = [
            [
                'value' => 'AC',
                'text' => 'Acre'
            ],
            [
                'value' => 'AL',
                'text' => 'Alagoas'
            ],
            [
                'value' => 'AM',
                'text' => 'Amazonas'
            ],
            [
                'value' => 'AP',
                'text' => 'Amapá'
            ],
            [
                'value' => 'BA',
                'text' => 'Bahia'
            ],
            [
                'value' => 'CE',
                'text' => 'Ceará'
            ],
            [
                'value' => 'DF',
                'text' => 'Distrito Federal'
            ],
            [
                'value' => 'ES',
                'text' => 'Espírito Santo'
            ],
            [
                'value' => 'GO',
                'text' => 'Goiás'
            ],
            [
                'value' => 'MA',
                'text' => 'Maranhão'
            ],
            [
                'value' => 'MG',
                'text' => 'Minas Gerais'
            ],
            [
                'value' => 'MS',
                'text' => 'Mato Grosso do Sul'
            ],
            [
                'value' => 'MT',
                'text' => 'Mato Grosso'
            ],
            [
                'value' => 'PA',
                'text' => 'Pará'
            ],
            [
                'value' => 'PB',
                'text' => 'Paraíba'
            ],
            [
                'value' => 'PE',
                'text' => 'Pernambuco'
            ],
            [
                'value' => 'PI',
                'text' => 'Piauí'
            ],
            [
                'value' => 'PR',
                'text' => 'Paraná'
            ],
            [
                'value' => 'RJ',
                'text' => 'Rio de Janeiro'
            ],
            [
                'value' => 'RN',
                'text' => 'Rio Grande do Norte'
            ],
            [
                'value' => 'RO',
                'text' => 'Rondônia'
            ],
            [
                'value' => 'RR',
                'text' => 'Roraima'
            ],
            [
                'value' => 'RS',
                'text' => 'Rio Grande do Sul'
            ],
            [
                'value' => 'SC',
                'text' => 'Santa Catarina'
            ],
            [
                'value' => 'SE',
                'text' => 'Sergipe'
            ],
            [
                'value' => 'SP',
                'text' => 'São Paulo'
            ],
            [
                'value' => 'TO',
                'text' => 'Tocantins'
            ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getOrientacaoSexual')) {
    function getOrientacaoSexual($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Heterossexual', 'value' => 'heterossexual' ],
            [ 'text' => 'Homossexual', 'value' => 'homossexual' ],
            [ 'text' => 'Bissexual', 'value' => 'bissexual' ],
            [ 'text' => 'Assexual', 'value' => 'assexual' ],
            [ 'text' => 'Pansexual', 'value' => 'pansexual' ],
            [ 'text' => 'Outros', 'value' => 'outros' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoObito')) {
    function getTipoObito($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Fetal', 'value' => 'fetal' ],
            [ 'text' => 'Não Fetal', 'value' => 'nao-fetal' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getSexo')) {
    function getSexo($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Feminino', 'value' => 'feminino' ],
            [ 'text' => 'Masculino', 'value' => 'masculino' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCor')) {
    function getCor($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Branca', 'value' => 'branca' ],
            [ 'text' => 'Preta', 'value' => 'preta' ],
            [ 'text' => 'Amarela', 'value' => 'amarela' ],
            [ 'text' => 'Parda', 'value' => 'parda' ],
            [ 'text' => 'Indígena', 'value' => 'indigena' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getLocalObito')) {
    function getLocalObito($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Hospital', 'value' => 'hospital' ],
            [ 'text' => 'Outro Estab. de Saúde', 'value' => 'estabelecimento-saude' ],
            [ 'text' => 'Domicílio', 'value' => 'domicilio' ],
            [ 'text' => 'Via Pública', 'value' => 'via-publica' ],
            [ 'text' => 'Aldeia Indígena', 'value' => 'aldeia-indigena' ],
            [ 'text' => 'Outros', 'value' => 'outros' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getPadrao')) {
    function getPadrao($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Sim', 'value' => true ],
            [ 'text' => 'Não', 'value' => false ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoGravidez')) {
    function getTipoGravidez($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Única', 'value' => 'unica' ],
            [ 'text' => 'Dupla', 'value' => 'dupla' ],
            [ 'text' => 'Tripla', 'value' => 'tripla' ],
            [ 'text' => 'Mais', 'value' => 'mais' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoParto')) {
    function getTipoParto($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Vaginal', 'value' => 'vaginal' ],
            [ 'text' => 'Cesáreo', 'value' => 'cesareo' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getMorteParto')) {
    function getMorteParto($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Antes', 'value' => 'antes' ],
            [ 'text' => 'Durante', 'value' => 'durante' ],
            [ 'text' => 'Depois', 'value' => 'depois' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getNaturezaObito')) {
    function getNaturezaObito($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Natural', 'value' => 'natural' ],
            [ 'text' => 'Não natural', 'value' => 'nao-natural' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getMomentoMorteMulher')) {
    function getMomentoMorteMulher($selectedOption=null)
    {
        $options = [
            [ 'text' => 'na gravidez', 'value' => 'gravidez' ],
            [ 'text' => 'no parto', 'value' => 'parto' ],
            [ 'text' => 'no abortamento', 'value' => 'aborto' ],
            [ 'text' => 'até 42 dias após a gestação', 'value' => 'ate-42-dias-pos-gestacao' ],
            [ 'text' => 'de 43 dias a 1 anos após a gestação', 'value' => 'de-43-dias-a-1-ano-pos-gestacao' ],
            [ 'text' => 'não correu nesses períodos', 'value' => 'nenhum' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoCausaExternaObito')) {
    function getTipoCausaExternaObito($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Acidente', 'value' => 'acidente' ],
            [ 'text' => 'Suicídio', 'value' => 'suicidio' ],
            [ 'text' => 'Homicídio', 'value' => 'homicidio' ],
            [ 'text' => 'Outros', 'value' => 'outros' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getFonteInformacaoObito')) {
    function getFonteInformacaoObito($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Ocorrência policial', 'value' => 'ocorrencia-policial' ],
            [ 'text' => 'Hospital', 'value' => 'hospital' ],
            [ 'text' => 'Família', 'value' => 'familia' ],
            [ 'text' => 'Outra', 'value' => 'outra' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoSanguineo')) {
    function getTipoSanguineo($selectedOption=null)
    {
        $options = [
            [ 'text' => 'AB+', 'value' => 'ab-mais' ],
            [ 'text' => 'A+', 'value' => 'a-mais' ],
            [ 'text' => 'B+', 'value' => 'b-mais' ],
            [ 'text' => 'O+', 'value' => 'o-mais' ],
            [ 'text' => 'AB-', 'value' => 'ab-menos' ],
            [ 'text' => 'A-', 'value' => 'a-menos' ],
            [ 'text' => 'B-', 'value' => 'b-menos' ],
            [ 'text' => 'O-', 'value' => 'o-menos' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getBiotipo')) {
    function getBiotipo($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Magro', 'value' => 'magro' ],
            [ 'text' => 'Sobrepeso', 'value' => 'sobrepeso' ],
            [ 'text' => 'Entroncado', 'value' => 'entroncado' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCorOlho')) {
    function getCorOlho($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Castanhos escuros', 'value' => 'castanhos-escuros' ],
            [ 'text' => 'Castanhos claros', 'value' => 'castanhos-claros' ],
            [ 'text' => 'Castanhos esverdeados', 'value' => 'castanhos-esverdeados' ],
            [ 'text' => 'Azuis esverdeados', 'value' => 'azuis-esverdeados' ],
            [ 'text' => 'Azuis', 'value' => 'azuis' ],
            [ 'text' => 'Cinzas', 'value' => 'cinzas' ],
            [ 'text' => 'Desiguais', 'value' => 'desiguais' ],
            [ 'text' => 'Pretos', 'value' => 'pretos' ],
            [ 'text' => 'Verdes', 'value' => 'verdes' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoCabelo')) {
    function getTipoCabelo($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Crespos', 'value' => 'crespos' ],
            [ 'text' => 'Ondulados', 'value' => 'ondulados' ],
            [ 'text' => 'Encaracolados', 'value' => 'encaracolados' ],
            [ 'text' => 'Lisos', 'value' => 'lisos' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();

            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCorCabelo')) {
    function getCorCabelo($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Amarelo', 'value' => 'amarelo' ],
            [ 'text' => 'Branco', 'value' => 'branco' ],
            [ 'text' => 'Castanho Claro', 'value' => 'castanho-claro' ],
            [ 'text' => 'Raspado', 'value' => 'castanho-escuro' ],
            [ 'text' => 'Grisalho', 'value' => 'grisalho' ],
            [ 'text' => 'Preto', 'value' => 'preto' ],
            [ 'text' => 'Tingido', 'value' => 'tingido' ],
            [ 'text' => 'Vermelho', 'value' => 'vermelho' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCorteCabelo')) {
    function getCorteCabelo($selectedOption=null)
    {
        $options = [
            [ 'text' => 'Curto', 'value' => 'curto' ],
            [ 'text' => 'Careca', 'value' => 'careca' ],
            [ 'text' => 'Raspado', 'value' => 'raspado' ],
            [ 'text' => 'Calvo', 'value' => 'calvo' ],
            [ 'text' => 'Médio', 'value' => 'medio' ],
            [ 'text' => 'Longo', 'value' => 'longo' ],
            [ 'text' => 'Trançado', 'value' => 'trancado' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if(count($result) > 0)
                return $result['text'];

            return '';
        }

        return $options;
    }
}





  