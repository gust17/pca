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

if (! function_exists('codeMaker')) {
    function codeMaker($id)
    {
        // formato: 00000/20XX
        $value = sprintf('%05d', $id) . '/' . date("Y");

        return $value;
    }
}

if (! function_exists('getEscolaridade')) {
    function getEscolaridade($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }


        return $options;
    }
}

if (! function_exists('getEstadoCivil')) {
    function getEstadoCivil($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getFormacaoProfissional')) {
    function getFormacaoProfissional($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoEndereco')) {
    function getTipoEndereco($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCidade')) {
    function getCidade($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getUF')) {
    function getUF($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getOrientacaoSexual')) {
    function getOrientacaoSexual($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoObito')) {
    function getTipoObito($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Fetal', 'value' => 'fetal' ],
            [ 'text' => 'Não Fetal', 'value' => 'nao-fetal' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getSexo')) {
    function getSexo($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Feminino', 'value' => 'feminino' ],
            [ 'text' => 'Masculino', 'value' => 'masculino' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCor')) {
    function getCor($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getLocalObito')) {
    function getLocalObito($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getPadrao')) {
    function getPadrao($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Sim', 'value' => true ],
            [ 'text' => 'Não', 'value' => false ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoGravidez')) {
    function getTipoGravidez($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoParto')) {
    function getTipoParto($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Vaginal', 'value' => 'vaginal' ],
            [ 'text' => 'Cesáreo', 'value' => 'cesareo' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getMorteParto')) {
    function getMorteParto($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Antes', 'value' => 'antes' ],
            [ 'text' => 'Durante', 'value' => 'durante' ],
            [ 'text' => 'Depois', 'value' => 'depois' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getNaturezaObito')) {
    function getNaturezaObito($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Natural', 'value' => 'natural' ],
            [ 'text' => 'Não natural', 'value' => 'nao-natural' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getMomentoMorteMulher')) {
    function getMomentoMorteMulher($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoCausaExternaObito')) {
    function getTipoCausaExternaObito($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getFonteInformacaoObito')) {
    function getFonteInformacaoObito($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoSanguineo')) {
    function getTipoSanguineo($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getBiotipo')) {
    function getBiotipo($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Magro', 'value' => 'magro' ],
            [ 'text' => 'Sobrepeso', 'value' => 'sobrepeso' ],
            [ 'text' => 'Entroncado', 'value' => 'entroncado' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCorOlho')) {
    function getCorOlho($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoCabelo')) {
    function getTipoCabelo($selectedOption=null, $storeOption=null)
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

            if($result)
                return $result['text'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCorCabelo')) {
    function getCorCabelo($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCorteCabelo')) {
    function getCorteCabelo($selectedOption=null, $storeOption=null)
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
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoDocumento')) {
    function getTipoDocumento($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'CPF', 'value' => 'cpf' ],
            [ 'text' => 'RG', 'value' => 'rg' ],
            [ 'text' => 'CNPJ', 'value' => 'cnpj' ],
            [ 'text' => 'Passaporte', 'value' => 'passaporte' ]
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getGrauParentesco')) {
    function getGrauParentesco($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Pai', 'value' => 'pai' ],
            [ 'text' => 'Mãe', 'value' => 'mae' ],
            [ 'text' => 'Cônjuge', 'value' => 'conjuge' ],
            [ 'text' => 'Irmão(a)', 'value' => 'irmao-irma' ],
            [ 'text' => 'Outro', 'value' => 'outro' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCondicaoPessoa')) {
    function getCondicaoPessoa($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Criança', 'value' => 'crianca' ],
            [ 'text' => 'Adolescente', 'value' => 'adolescente' ],
            [ 'text' => 'Adulto', 'value' => 'adulto' ],
            [ 'text' => 'Auto de Prisão em Flagrante', 'value' => 'idoso' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoDocumentoPericia')) {
    function getTipoDocumentoPericia($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Ofício', 'value' => 'oficio' ],
            [ 'text' => 'Requerimento', 'value' => 'requerimento' ],
            [ 'text' => 'Inquérito Policial', 'value' => 'inquerito_policial' ],
            [ 'text' => 'Auto de Prisão em Flagrante', 'value' => 'auto_de_prisao_em_flagrante' ],
            [ 'text' => 'Requisição', 'value' => 'requisicao' ],
            [ 'text' => 'Boletim de ocorrência', 'value' => 'boletim_de_ocorrencia' ],
            [ 'text' => 'Termo circunstanciado', 'value' => 'termo_circunstanciado' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoPericia')) {
    function getTipoPericia($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Com material', 'value' => 'com-material' ],
            [ 'text' => 'Sem material', 'value' => 'sem-material' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getDocumentoReferencia')) {
    function getDocumentoReferencia($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Inquérito Policial', 'value' => 'inquerito_policial' ],
            [ 'text' => 'Boletim de Ocorrência', 'value' => 'boletim_de_ocorrencia' ],
            [ 'text' => 'Auto de Prisão em Flagrante', 'value' => 'auto_de_prisao_em_flagrante' ],
            [ 'text' => 'Termo Circunstanciado', 'value' => 'termo_circunstanciado' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getCategoriaMaterial')) {
    function getCategoriaMaterial($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Biológico', 'value' => 'biologico' ],
            [ 'text' => 'Não-Biológico', 'value' => 'nao-biologico' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getTipoMaterial')) {
    function getTipoMaterial($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Amostra', 'value' => 'amostra' ],
            [ 'text' => 'Arma Branca', 'value' => 'arma_branca' ],
            [ 'text' => 'Arma de Fogo', 'value' => 'arma_de_fogo' ],
            [ 'text' => 'Artefato Caseiro', 'value' => 'artefato_caseiro' ],
            [ 'text' => 'Cadáver', 'value' => 'cadaver' ],
            [ 'text' => 'Droga', 'value' => 'droga' ],
            [ 'text' => 'Elétrico', 'value' => 'eletrico' ],
            [ 'text' => 'Eletrônico', 'value' => 'eletronico' ],
            [ 'text' => 'Munição', 'value' => 'municao' ],
            [ 'text' => 'Veículo', 'value' => 'veiculo' ],
            [ 'text' => 'Outros', 'value' => 'outros' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getUnidadeMedida')) {
    function getUnidadeMedida($selectedOption=null, $storeOption=null)
    {
        $options = [
            [ 'text' => 'Unidade medida 1', 'value' => '1' ],
            [ 'text' => 'Unidade medida 2', 'value' => '2' ],
        ];

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}

if (! function_exists('getPais')) {
    function getPais($selectedOption=null, $storeOption=null)
    {
        $options = array (
            0 =>
            array(
               'ordem' => 1,
               'text' => 'Afeganistão',
               'sigla2' => 'AF',
               'value' => 'AFG',
               'codigo' => '004',
            ),
            1 =>
            array(
               'ordem' => 2,
               'text' => 'África do Sul',
               'sigla2' => 'ZA',
               'value' => 'ZAF',
               'codigo' => '710',
            ),
            2 =>
            array(
               'ordem' => 3,
               'text' => 'Albânia',
               'sigla2' => 'AL',
               'value' => 'ALB',
               'codigo' => '008',
            ),
            3 =>
            array(
               'ordem' => 4,
               'text' => 'Alemanha',
               'sigla2' => 'DE',
               'value' => 'DEU',
               'codigo' => '276',
            ),
            4 =>
            array(
               'ordem' => 5,
               'text' => 'Andorra',
               'sigla2' => 'AD',
               'value' => 'AND',
               'codigo' => '020',
            ),
            5 =>
            array(
               'ordem' => 6,
               'text' => 'Angola',
               'sigla2' => 'AO',
               'value' => 'AGO',
               'codigo' => '024',
            ),
            6 =>
            array(
               'ordem' => 7,
               'text' => 'Anguilla',
               'sigla2' => 'AI',
               'value' => 'AIA',
               'codigo' => '660',
            ),
            7 =>
            array(
               'ordem' => 8,
               'text' => 'Antártida',
               'sigla2' => 'AQ',
               'value' => 'ATA',
               'codigo' => '010',
            ),
            8 =>
            array(
               'ordem' => 9,
               'text' => 'Antígua e Barbuda',
               'sigla2' => 'AG',
               'value' => 'ATG',
               'codigo' => '028',
            ),
            9 =>
            array(
               'ordem' => 10,
               'text' => 'Antilhas Holandesas',
               'sigla2' => 'AN',
               'value' => 'ANT',
               'codigo' => '530',
            ),
            10 =>
            array(
               'ordem' => 11,
               'text' => 'Arábia Saudita',
               'sigla2' => 'SA',
               'value' => 'SAU',
               'codigo' => '682',
            ),
            11 =>
            array(
               'ordem' => 12,
               'text' => 'Argélia',
               'sigla2' => 'DZ',
               'value' => 'DZA',
               'codigo' => '012',
            ),
            12 =>
            array(
               'ordem' => 13,
               'text' => 'Argentina',
               'sigla2' => 'AR',
               'value' => 'ARG',
               'codigo' => '032',
            ),
            13 =>
            array(
               'ordem' => 14,
               'text' => 'Armênia',
               'sigla2' => 'AM',
               'value' => 'ARM',
               'codigo' => '51',
            ),
            14 =>
            array(
               'ordem' => 15,
               'text' => 'Aruba',
               'sigla2' => 'AW',
               'value' => 'ABW',
               'codigo' => '533',
            ),
            15 =>
            array(
               'ordem' => 16,
               'text' => 'Austrália',
               'sigla2' => 'AU',
               'value' => 'AUS',
               'codigo' => '036',
            ),
            16 =>
            array(
               'ordem' => 17,
               'text' => 'Áustria',
               'sigla2' => 'AT',
               'value' => 'AUT',
               'codigo' => '040',
            ),
            17 =>
            array(
               'ordem' => 18,
               'text' => 'Azerbaijão',
               'sigla2' => 'AZ  ',
               'value' => 'AZE',
               'codigo' => '31',
            ),
            18 =>
            array(
               'ordem' => 19,
               'text' => 'Bahamas',
               'sigla2' => 'BS',
               'value' => 'BHS',
               'codigo' => '044',
            ),
            19 =>
            array(
               'ordem' => 20,
               'text' => 'Bahrein',
               'sigla2' => 'BH',
               'value' => 'BHR',
               'codigo' => '048',
            ),
            20 =>
            array(
               'ordem' => 21,
               'text' => 'Bangladesh',
               'sigla2' => 'BD',
               'value' => 'BGD',
               'codigo' => '050',
            ),
            21 =>
            array(
               'ordem' => 22,
               'text' => 'Barbados',
               'sigla2' => 'BB',
               'value' => 'BRB',
               'codigo' => '052',
            ),
            22 =>
            array(
               'ordem' => 23,
               'text' => 'Belarus',
               'sigla2' => 'BY',
               'value' => 'BLR',
               'codigo' => '112',
            ),
            23 =>
            array(
               'ordem' => 24,
               'text' => 'Bélgica',
               'sigla2' => 'BE',
               'value' => 'BEL',
               'codigo' => '056',
            ),
            24 =>
            array(
               'ordem' => 25,
               'text' => 'Belize',
               'sigla2' => 'BZ',
               'value' => 'BLZ',
               'codigo' => '084',
            ),
            25 =>
            array(
               'ordem' => 26,
               'text' => 'Benin',
               'sigla2' => 'BJ',
               'value' => 'BEN',
               'codigo' => '204',
            ),
            26 =>
            array(
               'ordem' => 27,
               'text' => 'Bermudas',
               'sigla2' => 'BM',
               'value' => 'BMU',
               'codigo' => '060',
            ),
            27 =>
            array(
               'ordem' => 28,
               'text' => 'Bolívia',
               'sigla2' => 'BO',
               'value' => 'BOL',
               'codigo' => '068',
            ),
            28 =>
            array(
               'ordem' => 29,
               'text' => 'Bósnia-Herzegóvina',
               'sigla2' => 'BA',
               'value' => 'BIH',
               'codigo' => '070',
            ),
            29 =>
            array(
               'ordem' => 30,
               'text' => 'Botsuana',
               'sigla2' => 'BW',
               'value' => 'BWA',
               'codigo' => '072',
            ),
            30 =>
            array(
               'ordem' => 31,
               'text' => 'Brasil',
               'sigla2' => 'BR',
               'value' => 'BRA',
               'codigo' => '076',
            ),
            31 =>
            array(
               'ordem' => 32,
               'text' => 'Brunei',
               'sigla2' => 'BN',
               'value' => 'BRN',
               'codigo' => '096',
            ),
            32 =>
            array(
               'ordem' => 33,
               'text' => 'Bulgária',
               'sigla2' => 'BG',
               'value' => 'BGR',
               'codigo' => '100',
            ),
            33 =>
            array(
               'ordem' => 34,
               'text' => 'Burkina Fasso',
               'sigla2' => 'BF',
               'value' => 'BFA',
               'codigo' => '854',
            ),
            34 =>
            array(
               'ordem' => 35,
               'text' => 'Burundi',
               'sigla2' => 'BI',
               'value' => 'BDI',
               'codigo' => '108',
            ),
            35 =>
            array(
               'ordem' => 36,
               'text' => 'Butão',
               'sigla2' => 'BT',
               'value' => 'BTN',
               'codigo' => '064',
            ),
            36 =>
            array(
               'ordem' => 37,
               'text' => 'Cabo Verde',
               'sigla2' => 'CV',
               'value' => 'CPV',
               'codigo' => '132',
            ),
            37 =>
            array(
               'ordem' => 38,
               'text' => 'Camarões',
               'sigla2' => 'CM',
               'value' => 'CMR',
               'codigo' => '120',
            ),
            38 =>
            array(
               'ordem' => 39,
               'text' => 'Camboja',
               'sigla2' => 'KH',
               'value' => 'KHM',
               'codigo' => '116',
            ),
            39 =>
            array(
               'ordem' => 40,
               'text' => 'Canadá',
               'sigla2' => 'CA',
               'value' => 'CAN',
               'codigo' => '124',
            ),
            40 =>
            array(
               'ordem' => 41,
               'text' => 'Cazaquistão',
               'sigla2' => 'KZ',
               'value' => 'KAZ',
               'codigo' => '398',
            ),
            41 =>
            array(
               'ordem' => 42,
               'text' => 'Chade',
               'sigla2' => 'TD',
               'value' => 'TCD',
               'codigo' => '148',
            ),
            42 =>
            array(
               'ordem' => 43,
               'text' => 'Chile',
               'sigla2' => 'CL',
               'value' => 'CHL',
               'codigo' => '152',
            ),
            43 =>
            array(
               'ordem' => 44,
               'text' => 'China',
               'sigla2' => 'CN',
               'value' => 'CHN',
               'codigo' => '156',
            ),
            44 =>
            array(
               'ordem' => 45,
               'text' => 'Chipre',
               'sigla2' => 'CY',
               'value' => 'CYP',
               'codigo' => '196',
            ),
            45 =>
            array(
               'ordem' => 46,
               'text' => 'Cingapura',
               'sigla2' => 'SG',
               'value' => 'SGP',
               'codigo' => '702',
            ),
            46 =>
            array(
               'ordem' => 47,
               'text' => 'Colômbia',
               'sigla2' => 'CO',
               'value' => 'COL',
               'codigo' => '170',
            ),
            47 =>
            array(
               'ordem' => 48,
               'text' => 'Congo',
               'sigla2' => 'CG',
               'value' => 'COG',
               'codigo' => '178',
            ),
            48 =>
            array(
               'ordem' => 49,
               'text' => 'Coréia do Norte',
               'sigla2' => 'KP',
               'value' => 'PRK',
               'codigo' => '408',
            ),
            49 =>
            array(
               'ordem' => 50,
               'text' => 'Coréia do Sul',
               'sigla2' => 'KR',
               'value' => 'KOR',
               'codigo' => '410',
            ),
            50 =>
            array(
               'ordem' => 51,
               'text' => 'Costa do Marfim',
               'sigla2' => 'CI',
               'value' => 'CIV',
               'codigo' => '384',
            ),
            51 =>
            array(
               'ordem' => 52,
               'text' => 'Costa Rica',
               'sigla2' => 'CR',
               'value' => 'CRI',
               'codigo' => '188',
            ),
            52 =>
            array(
               'ordem' => 53,
               'text' => 'Croácia (Hrvatska)',
               'sigla2' => 'HR',
               'value' => 'HRV',
               'codigo' => '191',
            ),
            53 =>
            array(
               'ordem' => 54,
               'text' => 'Cuba',
               'sigla2' => 'CU',
               'value' => 'CUB',
               'codigo' => '192',
            ),
            54 =>
            array(
               'ordem' => 55,
               'text' => 'Dinamarca',
               'sigla2' => 'DK',
               'value' => 'DNK',
               'codigo' => '208',
            ),
            55 =>
            array(
               'ordem' => 56,
               'text' => 'Djibuti',
               'sigla2' => 'DJ',
               'value' => 'DJI',
               'codigo' => '262',
            ),
            56 =>
            array(
               'ordem' => 57,
               'text' => 'Dominica',
               'sigla2' => 'DM',
               'value' => 'DMA',
               'codigo' => '212',
            ),
            57 =>
            array(
               'ordem' => 58,
               'text' => 'Egito',
               'sigla2' => 'EG',
               'value' => 'EGY',
               'codigo' => '818',
            ),
            58 =>
            array(
               'ordem' => 59,
               'text' => 'El Salvador',
               'sigla2' => 'SV',
               'value' => 'SLV',
               'codigo' => '222',
            ),
            59 =>
            array(
               'ordem' => 60,
               'text' => 'Emirados Árabes Unidos',
               'sigla2' => 'AE',
               'value' => 'ARE',
               'codigo' => '784',
            ),
            60 =>
            array(
               'ordem' => 61,
               'text' => 'Equador',
               'sigla2' => 'EC',
               'value' => 'ECU',
               'codigo' => '218',
            ),
            61 =>
            array(
               'ordem' => 62,
               'text' => 'Eritréia',
               'sigla2' => 'ER',
               'value' => 'ERI',
               'codigo' => '232',
            ),
            62 =>
            array(
               'ordem' => 63,
               'text' => 'Eslováquia',
               'sigla2' => 'SK',
               'value' => 'SVK',
               'codigo' => '703',
            ),
            63 =>
            array(
               'ordem' => 64,
               'text' => 'Eslovênia',
               'sigla2' => 'SI',
               'value' => 'SVN',
               'codigo' => '705',
            ),
            64 =>
            array(
               'ordem' => 65,
               'text' => 'Espanha',
               'sigla2' => 'ES',
               'value' => 'ESP',
               'codigo' => '724',
            ),
            65 =>
            array(
               'ordem' => 66,
               'text' => 'Estados Unidos',
               'sigla2' => 'US',
               'value' => 'USA',
               'codigo' => '840',
            ),
            66 =>
            array(
               'ordem' => 67,
               'text' => 'Estônia',
               'sigla2' => 'EE',
               'value' => 'EST',
               'codigo' => '233',
            ),
            67 =>
            array(
               'ordem' => 68,
               'text' => 'Etiópia',
               'sigla2' => 'ET',
               'value' => 'ETH',
               'codigo' => '231',
            ),
            68 =>
            array(
               'ordem' => 69,
               'text' => 'Fiji',
               'sigla2' => 'FJ',
               'value' => 'FJI',
               'codigo' => '242',
            ),
            69 =>
            array(
               'ordem' => 70,
               'text' => 'Filipinas',
               'sigla2' => 'PH',
               'value' => 'PHL',
               'codigo' => '608',
            ),
            70 =>
            array(
               'ordem' => 71,
               'text' => 'Finlândia',
               'sigla2' => 'FI',
               'value' => 'FIN',
               'codigo' => '246',
            ),
            71 =>
            array(
               'ordem' => 72,
               'text' => 'França',
               'sigla2' => 'FR',
               'value' => 'FRA',
               'codigo' => '250',
            ),
            72 =>
            array(
               'ordem' => 73,
               'text' => 'Gabão',
               'sigla2' => 'GA',
               'value' => 'GAB',
               'codigo' => '266',
            ),
            73 =>
            array(
               'ordem' => 74,
               'text' => 'Gâmbia',
               'sigla2' => 'GM',
               'value' => 'GMB',
               'codigo' => '270',
            ),
            74 =>
            array(
               'ordem' => 75,
               'text' => 'Gana',
               'sigla2' => 'GH',
               'value' => 'GHA',
               'codigo' => '288',
            ),
            75 =>
            array(
               'ordem' => 76,
               'text' => 'Geórgia',
               'sigla2' => 'GE',
               'value' => 'GEO',
               'codigo' => '268',
            ),
            76 =>
            array(
               'ordem' => 77,
               'text' => 'Gibraltar',
               'sigla2' => 'GI',
               'value' => 'GIB',
               'codigo' => '292',
            ),
            77 =>
            array(
               'ordem' => 78,
               'text' => 'Grã-Bretanha (Reino Unido, UK)',
               'sigla2' => 'GB',
               'value' => 'GBR',
               'codigo' => '826',
            ),
            78 =>
            array(
               'ordem' => 79,
               'text' => 'Granada',
               'sigla2' => 'GD',
               'value' => 'GRD',
               'codigo' => '308',
            ),
            79 =>
            array(
               'ordem' => 80,
               'text' => 'Grécia',
               'sigla2' => 'GR',
               'value' => 'GRC',
               'codigo' => '300',
            ),
            80 =>
            array(
               'ordem' => 81,
               'text' => 'Groelândia',
               'sigla2' => 'GL',
               'value' => 'GRL',
               'codigo' => '304',
            ),
            81 =>
            array(
               'ordem' => 82,
               'text' => 'Guadalupe',
               'sigla2' => 'GP',
               'value' => 'GLP',
               'codigo' => '312',
            ),
            82 =>
            array(
               'ordem' => 83,
               'text' => 'Guam (Território dos Estados Unidos)',
               'sigla2' => 'GU',
               'value' => 'GUM',
               'codigo' => '316',
            ),
            83 =>
            array(
               'ordem' => 84,
               'text' => 'Guatemala',
               'sigla2' => 'GT',
               'value' => 'GTM',
               'codigo' => '320',
            ),
            84 =>
            array(
               'ordem' => 85,
               'text' => 'Guernsey',
               'sigla2' => 'G',
               'value' => 'GGY',
               'codigo' => '832',
            ),
            85 =>
            array(
               'ordem' => 86,
               'text' => 'Guiana',
               'sigla2' => 'GY',
               'value' => 'GUY',
               'codigo' => '328',
            ),
            86 =>
            array(
               'ordem' => 87,
               'text' => 'Guiana Francesa',
               'sigla2' => 'GF',
               'value' => 'GUF',
               'codigo' => '254',
            ),
            87 =>
            array(
               'ordem' => 88,
               'text' => 'Guiné',
               'sigla2' => 'GN',
               'value' => 'GIN',
               'codigo' => '324',
            ),
            88 =>
            array(
               'ordem' => 89,
               'text' => 'Guiné Equatorial',
               'sigla2' => 'GQ',
               'value' => 'GNQ',
               'codigo' => '226',
            ),
            89 =>
            array(
               'ordem' => 90,
               'text' => 'Guiné-Bissau',
               'sigla2' => 'GW',
               'value' => 'GNB',
               'codigo' => '624',
            ),
            90 =>
            array(
               'ordem' => 91,
               'text' => 'Haiti',
               'sigla2' => 'HT',
               'value' => 'HTI',
               'codigo' => '332',
            ),
            91 =>
            array(
               'ordem' => 92,
               'text' => 'Holanda',
               'sigla2' => 'NL',
               'value' => 'NLD',
               'codigo' => '528',
            ),
            92 =>
            array(
               'ordem' => 93,
               'text' => 'Honduras',
               'sigla2' => 'HN',
               'value' => 'HND',
               'codigo' => '340',
            ),
            93 =>
            array(
               'ordem' => 94,
               'text' => 'Hong Kong',
               'sigla2' => 'HK',
               'value' => 'HKG',
               'codigo' => '344',
            ),
            94 =>
            array(
               'ordem' => 95,
               'text' => 'Hungria',
               'sigla2' => 'HU',
               'value' => 'HUN',
               'codigo' => '348',
            ),
            95 =>
            array(
               'ordem' => 96,
               'text' => 'Iêmen',
               'sigla2' => 'YE',
               'value' => 'YEM',
               'codigo' => '887',
            ),
            96 =>
            array(
               'ordem' => 97,
               'text' => 'Ilha Bouvet (Território da Noruega)',
               'sigla2' => 'BV',
               'value' => 'BVT',
               'codigo' => '074',
            ),
            97 =>
            array(
               'ordem' => 98,
               'text' => 'Ilha do Homem',
               'sigla2' => 'IM',
               'value' => 'IMN',
               'codigo' => '833',
            ),
            98 =>
            array(
               'ordem' => 99,
               'text' => 'Ilha Natal',
               'sigla2' => 'CX',
               'value' => 'CXR',
               'codigo' => '162',
            ),
            99 =>
            array(
               'ordem' => 100,
               'text' => 'Ilha Pitcairn',
               'sigla2' => 'PN',
               'value' => 'PCN',
               'codigo' => '612',
            ),
            100 =>
            array(
               'ordem' => 101,
               'text' => 'Ilha Reunião',
               'sigla2' => 'RE',
               'value' => 'REU',
               'codigo' => '638',
            ),
            101 =>
            array(
               'ordem' => 102,
               'text' => 'Ilhas Aland',
               'sigla2' => 'AX',
               'value' => 'ALA',
               'codigo' => '248',
            ),
            102 =>
            array(
               'ordem' => 103,
               'text' => 'Ilhas Cayman',
               'sigla2' => 'KY',
               'value' => 'CYM',
               'codigo' => '136',
            ),
            103 =>
            array(
               'ordem' => 104,
               'text' => 'Ilhas Cocos',
               'sigla2' => 'CC',
               'value' => 'CCK',
               'codigo' => '166',
            ),
            104 =>
            array(
               'ordem' => 105,
               'text' => 'Ilhas Comores',
               'sigla2' => 'KM',
               'value' => 'COM',
               'codigo' => '174',
            ),
            105 =>
            array(
               'ordem' => 106,
               'text' => 'Ilhas Cook',
               'sigla2' => 'CK',
               'value' => 'COK',
               'codigo' => '184',
            ),
            106 =>
            array(
               'ordem' => 107,
               'text' => 'Ilhas Faroes',
               'sigla2' => 'FO',
               'value' => 'FRO',
               'codigo' => '234',
            ),
            107 =>
            array(
               'ordem' => 108,
               'text' => 'Ilhas Falkland (Malvinas)',
               'sigla2' => 'FK',
               'value' => 'FLK',
               'codigo' => '238',
            ),
            108 =>
            array(
               'ordem' => 109,
               'text' => 'Ilhas Geórgia do Sul e Sandwich do Sul',
               'sigla2' => 'GS',
               'value' => 'SGS',
               'codigo' => '239',
            ),
            109 =>
            array(
               'ordem' => 110,
               'text' => 'Ilhas Heard e McDonald (Território da Austrália)',
               'sigla2' => 'HM',
               'value' => 'HMD',
               'codigo' => '334',
            ),
            110 =>
            array(
               'ordem' => 111,
               'text' => 'Ilhas Marianas do Norte',
               'sigla2' => 'MP',
               'value' => 'MNP',
               'codigo' => '580',
            ),
            111 =>
            array(
               'ordem' => 112,
               'text' => 'Ilhas Marshall',
               'sigla2' => 'MH',
               'value' => 'MHL',
               'codigo' => '584',
            ),
            112 =>
            array(
               'ordem' => 113,
               'text' => 'Ilhas Menores dos Estados Unidos',
               'sigla2' => 'UM',
               'value' => 'UMI',
               'codigo' => '581',
            ),
            113 =>
            array(
               'ordem' => 114,
               'text' => 'Ilhas Norfolk',
               'sigla2' => 'NF',
               'value' => 'NFK',
               'codigo' => '574',
            ),
            114 =>
            array(
               'ordem' => 115,
               'text' => 'Ilhas Seychelles',
               'sigla2' => 'SC',
               'value' => 'SYC',
               'codigo' => '690',
            ),
            115 =>
            array(
               'ordem' => 116,
               'text' => 'Ilhas Solomão',
               'sigla2' => 'SB',
               'value' => 'SLB',
               'codigo' => '090',
            ),
            116 =>
            array(
               'ordem' => 117,
               'text' => 'Ilhas Svalbard e Jan Mayen',
               'sigla2' => 'SJ',
               'value' => 'SJM',
               'codigo' => '744',
            ),
            117 =>
            array(
               'ordem' => 118,
               'text' => 'Ilhas Tokelau',
               'sigla2' => 'TK',
               'value' => 'TKL',
               'codigo' => '772',
            ),
            118 =>
            array(
               'ordem' => 119,
               'text' => 'Ilhas Turks e Caicos',
               'sigla2' => 'TC',
               'value' => 'TCA',
               'codigo' => '796',
            ),
            119 =>
            array(
               'ordem' => 120,
               'text' => 'Ilhas Virgens (Estados Unidos)',
               'sigla2' => 'VI',
               'value' => 'VIR',
               'codigo' => '850',
            ),
            120 =>
            array(
               'ordem' => 121,
               'text' => 'Ilhas Virgens (Inglaterra)',
               'sigla2' => 'VG',
               'value' => 'VGB',
               'codigo' => '092',
            ),
            121 =>
            array(
               'ordem' => 122,
               'text' => 'Ilhas Wallis e Futuna',
               'sigla2' => 'WF',
               'value' => 'WLF',
               'codigo' => '876',
            ),
            122 =>
            array(
               'ordem' => 123,
               'text' => 'índia',
               'sigla2' => 'IN',
               'value' => 'IND',
               'codigo' => '356',
            ),
            123 =>
            array(
               'ordem' => 124,
               'text' => 'Indonésia',
               'sigla2' => 'ID',
               'value' => 'IDN',
               'codigo' => '360',
            ),
            124 =>
            array(
               'ordem' => 125,
               'text' => 'Irã',
               'sigla2' => 'IR',
               'value' => 'IRN',
               'codigo' => '364',
            ),
            125 =>
            array(
               'ordem' => 126,
               'text' => 'Iraque',
               'sigla2' => 'IQ',
               'value' => 'IRQ',
               'codigo' => '368',
            ),
            126 =>
            array(
               'ordem' => 127,
               'text' => 'Irlanda',
               'sigla2' => 'IE',
               'value' => 'IRL',
               'codigo' => '372',
            ),
            127 =>
            array(
               'ordem' => 128,
               'text' => 'Islândia',
               'sigla2' => 'IS',
               'value' => 'ISL',
               'codigo' => '352',
            ),
            128 =>
            array(
               'ordem' => 129,
               'text' => 'Israel',
               'sigla2' => 'IL',
               'value' => 'ISR',
               'codigo' => '376',
            ),
            129 =>
            array(
               'ordem' => 130,
               'text' => 'Itália',
               'sigla2' => 'IT',
               'value' => 'ITA',
               'codigo' => '380',
            ),
            130 =>
            array(
               'ordem' => 131,
               'text' => 'Jamaica',
               'sigla2' => 'JM',
               'value' => 'JAM',
               'codigo' => '388',
            ),
            131 =>
            array(
               'ordem' => 132,
               'text' => 'Japão',
               'sigla2' => 'JP',
               'value' => 'JPN',
               'codigo' => '392',
            ),
            132 =>
            array(
               'ordem' => 133,
               'text' => 'Jersey',
               'sigla2' => 'JE',
               'value' => 'JEY',
               'codigo' => '832',
            ),
            133 =>
            array(
               'ordem' => 134,
               'text' => 'Jordânia',
               'sigla2' => 'JO',
               'value' => 'JOR',
               'codigo' => '400',
            ),
            134 =>
            array(
               'ordem' => 135,
               'text' => 'Kênia',
               'sigla2' => 'KE',
               'value' => 'KEN',
               'codigo' => '404',
            ),
            135 =>
            array(
               'ordem' => 136,
               'text' => 'Kiribati',
               'sigla2' => 'KI',
               'value' => 'KIR',
               'codigo' => '296',
            ),
            136 =>
            array(
               'ordem' => 137,
               'text' => 'Kuait',
               'sigla2' => 'KW',
               'value' => 'KWT',
               'codigo' => '414',
            ),
            137 =>
            array(
               'ordem' => 138,
               'text' => 'Laos',
               'sigla2' => 'LA',
               'value' => 'LAO',
               'codigo' => '418',
            ),
            138 =>
            array(
               'ordem' => 139,
               'text' => 'Látvia',
               'sigla2' => 'LV',
               'value' => 'LVA',
               'codigo' => '428',
            ),
            139 =>
            array(
               'ordem' => 140,
               'text' => 'Lesoto',
               'sigla2' => 'LS',
               'value' => 'LSO',
               'codigo' => '426',
            ),
            140 =>
            array(
               'ordem' => 141,
               'text' => 'Líbano',
               'sigla2' => 'LB',
               'value' => 'LBN',
               'codigo' => '422',
            ),
            141 =>
            array(
               'ordem' => 142,
               'text' => 'Libéria',
               'sigla2' => 'LR',
               'value' => 'LBR',
               'codigo' => '430',
            ),
            142 =>
            array(
               'ordem' => 143,
               'text' => 'Líbia',
               'sigla2' => 'LY',
               'value' => 'LBY',
               'codigo' => '434',
            ),
            143 =>
            array(
               'ordem' => 144,
               'text' => 'Liechtenstein',
               'sigla2' => 'LI',
               'value' => 'LIE',
               'codigo' => '438',
            ),
            144 =>
            array(
               'ordem' => 145,
               'text' => 'Lituânia',
               'sigla2' => 'LT',
               'value' => 'LTU',
               'codigo' => '440',
            ),
            145 =>
            array(
               'ordem' => 146,
               'text' => 'Luxemburgo',
               'sigla2' => 'LU',
               'value' => 'LUX',
               'codigo' => '442',
            ),
            146 =>
            array(
               'ordem' => 147,
               'text' => 'Macau',
               'sigla2' => 'MO',
               'value' => 'MAC',
               'codigo' => '446',
            ),
            147 =>
            array(
               'ordem' => 148,
               'text' => 'Macedônia (República Yugoslava)',
               'sigla2' => 'MK',
               'value' => 'MKD',
               'codigo' => '807',
            ),
            148 =>
            array(
               'ordem' => 149,
               'text' => 'Madagascar',
               'sigla2' => 'MG',
               'value' => 'MDG',
               'codigo' => '450',
            ),
            149 =>
            array(
               'ordem' => 150,
               'text' => 'Malásia',
               'sigla2' => 'MY',
               'value' => 'MYS',
               'codigo' => '458',
            ),
            150 =>
            array(
               'ordem' => 151,
               'text' => 'Malaui',
               'sigla2' => 'MW',
               'value' => 'MWI',
               'codigo' => '454',
            ),
            151 =>
            array(
               'ordem' => 152,
               'text' => 'Maldivas',
               'sigla2' => 'MV',
               'value' => 'MDV',
               'codigo' => '462',
            ),
            152 =>
            array(
               'ordem' => 153,
               'text' => 'Mali',
               'sigla2' => 'ML',
               'value' => 'MLI',
               'codigo' => '466',
            ),
            153 =>
            array(
               'ordem' => 154,
               'text' => 'Malta',
               'sigla2' => 'MT',
               'value' => 'MLT',
               'codigo' => '470',
            ),
            154 =>
            array(
               'ordem' => 155,
               'text' => 'Marrocos',
               'sigla2' => 'MA',
               'value' => 'MAR',
               'codigo' => '504',
            ),
            155 =>
            array(
               'ordem' => 156,
               'text' => 'Martinica',
               'sigla2' => 'MQ',
               'value' => 'MTQ',
               'codigo' => '474',
            ),
            156 =>
            array(
               'ordem' => 157,
               'text' => 'Maurício',
               'sigla2' => 'MU',
               'value' => 'MUS',
               'codigo' => '480',
            ),
            157 =>
            array(
               'ordem' => 158,
               'text' => 'Mauritânia',
               'sigla2' => 'MR',
               'value' => 'MRT',
               'codigo' => '478',
            ),
            158 =>
            array(
               'ordem' => 159,
               'text' => 'Mayotte',
               'sigla2' => 'YT',
               'value' => 'MYT',
               'codigo' => '175',
            ),
            159 =>
            array(
               'ordem' => 160,
               'text' => 'México',
               'sigla2' => 'MX',
               'value' => 'MEX',
               'codigo' => '484',
            ),
            160 =>
            array(
               'ordem' => 161,
               'text' => 'Micronésia',
               'sigla2' => 'FM',
               'value' => 'FSM',
               'codigo' => '583',
            ),
            161 =>
            array(
               'ordem' => 162,
               'text' => 'Moçambique',
               'sigla2' => 'MZ',
               'value' => 'MOZ',
               'codigo' => '508',
            ),
            162 =>
            array(
               'ordem' => 163,
               'text' => 'Moldova',
               'sigla2' => 'MD',
               'value' => 'MDA',
               'codigo' => '498',
            ),
            163 =>
            array(
               'ordem' => 164,
               'text' => 'Mônaco',
               'sigla2' => 'MC',
               'value' => 'MCO',
               'codigo' => '492',
            ),
            164 =>
            array(
               'ordem' => 165,
               'text' => 'Mongólia',
               'sigla2' => 'MN',
               'value' => 'MNG',
               'codigo' => '496',
            ),
            165 =>
            array(
               'ordem' => 166,
               'text' => 'Montenegro',
               'sigla2' => 'ME',
               'value' => 'MNE',
               'codigo' => '499',
            ),
            166 =>
            array(
               'ordem' => 167,
               'text' => 'Montserrat',
               'sigla2' => 'MS',
               'value' => 'MSR',
               'codigo' => '500',
            ),
            167 =>
            array(
               'ordem' => 168,
               'text' => 'Myanma',
               'sigla2' => 'MM',
               'value' => 'MMR',
               'codigo' => '104',
            ),
            168 =>
            array(
               'ordem' => 169,
               'text' => 'Namíbia',
               'sigla2' => 'NA',
               'value' => 'NAM',
               'codigo' => '516',
            ),
            169 =>
            array(
               'ordem' => 170,
               'text' => 'Nauru',
               'sigla2' => 'NR',
               'value' => 'NRU',
               'codigo' => '520',
            ),
            170 =>
            array(
               'ordem' => 171,
               'text' => 'Nepal',
               'sigla2' => 'NP',
               'value' => 'NPL',
               'codigo' => '524',
            ),
            171 =>
            array(
               'ordem' => 172,
               'text' => 'Nicarágua',
               'sigla2' => 'NI',
               'value' => 'NIC',
               'codigo' => '558',
            ),
            172 =>
            array(
               'ordem' => 173,
               'text' => 'Níger',
               'sigla2' => 'NE',
               'value' => 'NER',
               'codigo' => '562',
            ),
            173 =>
            array(
               'ordem' => 174,
               'text' => 'Nigéria',
               'sigla2' => 'NG',
               'value' => 'NGA',
               'codigo' => '566',
            ),
            174 =>
            array(
               'ordem' => 175,
               'text' => 'Niue',
               'sigla2' => 'NU',
               'value' => 'NIU',
               'codigo' => '570',
            ),
            175 =>
            array(
               'ordem' => 176,
               'text' => 'Noruega',
               'sigla2' => 'NO',
               'value' => 'NOR',
               'codigo' => '578',
            ),
            176 =>
            array(
               'ordem' => 177,
               'text' => 'Nova Caledônia',
               'sigla2' => 'NC',
               'value' => 'NCL',
               'codigo' => '540',
            ),
            177 =>
            array(
               'ordem' => 178,
               'text' => 'Nova Zelândia',
               'sigla2' => 'NZ',
               'value' => 'NZL',
               'codigo' => '554',
            ),
            178 =>
            array(
               'ordem' => 179,
               'text' => 'Omã',
               'sigla2' => 'OM',
               'value' => 'OMN',
               'codigo' => '512',
            ),
            179 =>
            array(
               'ordem' => 180,
               'text' => 'Palau',
               'sigla2' => 'PW',
               'value' => 'PLW',
               'codigo' => '585',
            ),
            180 =>
            array(
               'ordem' => 181,
               'text' => 'Panamá',
               'sigla2' => 'PA',
               'value' => 'PAN',
               'codigo' => '591',
            ),
            181 =>
            array(
               'ordem' => 182,
               'text' => 'Papua-Nova Guiné',
               'sigla2' => 'PG',
               'value' => 'PNG',
               'codigo' => '598',
            ),
            182 =>
            array(
               'ordem' => 183,
               'text' => 'Paquistão',
               'sigla2' => 'PK',
               'value' => 'PAK',
               'codigo' => '586',
            ),
            183 =>
            array(
               'ordem' => 184,
               'text' => 'Paraguai',
               'sigla2' => 'PY',
               'value' => 'PRY',
               'codigo' => '600',
            ),
            184 =>
            array(
               'ordem' => 185,
               'text' => 'Peru',
               'sigla2' => 'PE',
               'value' => 'PER',
               'codigo' => '604',
            ),
            185 =>
            array(
               'ordem' => 186,
               'text' => 'Polinésia Francesa',
               'sigla2' => 'PF',
               'value' => 'PYF',
               'codigo' => '258',
            ),
            186 =>
            array(
               'ordem' => 187,
               'text' => 'Polônia',
               'sigla2' => 'PL',
               'value' => 'POL',
               'codigo' => '616',
            ),
            187 =>
            array(
               'ordem' => 188,
               'text' => 'Porto Rico',
               'sigla2' => 'PR',
               'value' => 'PRI',
               'codigo' => '630',
            ),
            188 =>
            array(
               'ordem' => 189,
               'text' => 'Portugal',
               'sigla2' => 'PT',
               'value' => 'PRT',
               'codigo' => '620',
            ),
            189 =>
            array(
               'ordem' => 190,
               'text' => 'Qatar',
               'sigla2' => 'QA',
               'value' => 'QAT',
               'codigo' => '634',
            ),
            190 =>
            array(
               'ordem' => 191,
               'text' => 'Quirguistão',
               'sigla2' => 'KG',
               'value' => 'KGZ',
               'codigo' => '417',
            ),
            191 =>
            array(
               'ordem' => 192,
               'text' => 'República Centro-Africana',
               'sigla2' => 'CF',
               'value' => 'CAF',
               'codigo' => '140',
            ),
            192 =>
            array(
               'ordem' => 193,
               'text' => 'República Democrática do Congo',
               'sigla2' => 'CD',
               'value' => 'COD',
               'codigo' => '180',
            ),
            193 =>
            array(
               'ordem' => 194,
               'text' => 'República Dominicana',
               'sigla2' => 'DO',
               'value' => 'DOM',
               'codigo' => '214',
            ),
            194 =>
            array(
               'ordem' => 195,
               'text' => 'República Tcheca',
               'sigla2' => 'CZ',
               'value' => 'CZE',
               'codigo' => '203',
            ),
            195 =>
            array(
               'ordem' => 196,
               'text' => 'Romênia',
               'sigla2' => 'RO',
               'value' => 'ROM',
               'codigo' => '642',
            ),
            196 =>
            array(
               'ordem' => 197,
               'text' => 'Ruanda',
               'sigla2' => 'RW',
               'value' => 'RWA',
               'codigo' => '646',
            ),
            197 =>
            array(
               'ordem' => 198,
               'text' => 'Rússia (antiga URSS) - Federação Russa',
               'sigla2' => 'RU',
               'value' => 'RUS',
               'codigo' => '643',
            ),
            198 =>
            array(
               'ordem' => 199,
               'text' => 'Saara Ocidental',
               'sigla2' => 'EH',
               'value' => 'ESH',
               'codigo' => '732',
            ),
            199 =>
            array(
               'ordem' => 200,
               'text' => 'Saint Vincente e Granadinas',
               'sigla2' => 'VC',
               'value' => 'VCT',
               'codigo' => '670',
            ),
            200 =>
            array(
               'ordem' => 201,
               'text' => 'Samoa Americana',
               'sigla2' => 'AS',
               'value' => 'ASM',
               'codigo' => '016',
            ),
            201 =>
            array(
               'ordem' => 202,
               'text' => 'Samoa Ocidental',
               'sigla2' => 'WS',
               'value' => 'WSM',
               'codigo' => '882',
            ),
            202 =>
            array(
               'ordem' => 203,
               'text' => 'San Marino',
               'sigla2' => 'SM',
               'value' => 'SMR',
               'codigo' => '674',
            ),
            203 =>
            array(
               'ordem' => 204,
               'text' => 'Santa Helena',
               'sigla2' => 'SH',
               'value' => 'SHN',
               'codigo' => '654',
            ),
            204 =>
            array(
               'ordem' => 205,
               'text' => 'Santa Lúcia',
               'sigla2' => 'LC',
               'value' => 'LCA',
               'codigo' => '662',
            ),
            205 =>
            array(
               'ordem' => 206,
               'text' => 'São Bartolomeu',
               'sigla2' => 'BL',
               'value' => 'BLM',
               'codigo' => '652',
            ),
            206 =>
            array(
               'ordem' => 207,
               'text' => 'São Cristóvão e Névis',
               'sigla2' => 'KN',
               'value' => 'KNA',
               'codigo' => '659',
            ),
            207 =>
            array(
               'ordem' => 208,
               'text' => 'São Martim',
               'sigla2' => 'MF',
               'value' => 'MAF',
               'codigo' => '663',
            ),
            208 =>
            array(
               'ordem' => 209,
               'text' => 'São Tomé e Príncipe',
               'sigla2' => 'ST',
               'value' => 'STP',
               'codigo' => '678',
            ),
            209 =>
            array(
               'ordem' => 210,
               'text' => 'Senegal',
               'sigla2' => 'SN',
               'value' => 'SEN',
               'codigo' => '686',
            ),
            210 =>
            array(
               'ordem' => 211,
               'text' => 'Serra Leoa',
               'sigla2' => 'SL',
               'value' => 'SLE',
               'codigo' => '694',
            ),
            211 =>
            array(
               'ordem' => 212,
               'text' => 'Sérvia',
               'sigla2' => 'RS',
               'value' => 'SRB',
               'codigo' => '688',
            ),
            212 =>
            array(
               'ordem' => 213,
               'text' => 'Síria',
               'sigla2' => 'SY',
               'value' => 'SYR',
               'codigo' => '760',
            ),
            213 =>
            array(
               'ordem' => 214,
               'text' => 'Somália',
               'sigla2' => 'SO',
               'value' => 'SOM',
               'codigo' => '706',
            ),
            214 =>
            array(
               'ordem' => 215,
               'text' => 'Sri Lanka',
               'sigla2' => 'LK',
               'value' => 'LKA',
               'codigo' => '144',
            ),
            215 =>
            array(
               'ordem' => 216,
               'text' => 'St. Pierre and Miquelon',
               'sigla2' => 'PM',
               'value' => 'SPM',
               'codigo' => '666',
            ),
            216 =>
            array(
               'ordem' => 217,
               'text' => 'Suazilândia',
               'sigla2' => 'SZ',
               'value' => 'SWZ',
               'codigo' => '748',
            ),
            217 =>
            array(
               'ordem' => 218,
               'text' => 'Sudão',
               'sigla2' => 'SD',
               'value' => 'SDN',
               'codigo' => '736',
            ),
            218 =>
            array(
               'ordem' => 219,
               'text' => 'Suécia',
               'sigla2' => 'SE',
               'value' => 'SWE',
               'codigo' => '752',
            ),
            219 =>
            array(
               'ordem' => 220,
               'text' => 'Suíça',
               'sigla2' => 'CH',
               'value' => 'CHE',
               'codigo' => '756',
            ),
            220 =>
            array(
               'ordem' => 221,
               'text' => 'Suriname',
               'sigla2' => 'SR',
               'value' => 'SUR',
               'codigo' => '740',
            ),
            221 =>
            array(
               'ordem' => 222,
               'text' => 'Tadjiquistão',
               'sigla2' => 'TJ',
               'value' => 'TJK',
               'codigo' => '762',
            ),
            222 =>
            array(
               'ordem' => 223,
               'text' => 'Tailândia',
               'sigla2' => 'TH',
               'value' => 'THA',
               'codigo' => '764',
            ),
            223 =>
            array(
               'ordem' => 224,
               'text' => 'Taiwan',
               'sigla2' => 'TW',
               'value' => 'TWN',
               'codigo' => '158',
            ),
            224 =>
            array(
               'ordem' => 225,
               'text' => 'Tanzânia',
               'sigla2' => 'TZ',
               'value' => 'TZA',
               'codigo' => '834',
            ),
            225 =>
            array(
               'ordem' => 226,
               'text' => 'Território Britânico do Oceano índico',
               'sigla2' => 'IO',
               'value' => 'IOT',
               'codigo' => '086',
            ),
            226 =>
            array(
               'ordem' => 227,
               'text' => 'Territórios do Sul da França',
               'sigla2' => 'TF',
               'value' => 'ATF',
               'codigo' => '260',
            ),
            227 =>
            array(
               'ordem' => 228,
               'text' => 'Territórios Palestinos Ocupados',
               'sigla2' => 'PS',
               'value' => 'PSE',
               'codigo' => '275',
            ),
            228 =>
            array(
               'ordem' => 229,
               'text' => 'Timor Leste',
               'sigla2' => 'TP',
               'value' => 'TMP',
               'codigo' => '626',
            ),
            229 =>
            array(
               'ordem' => 230,
               'text' => 'Togo',
               'sigla2' => 'TG',
               'value' => 'TGO',
               'codigo' => '768',
            ),
            230 =>
            array(
               'ordem' => 231,
               'text' => 'Tonga',
               'sigla2' => 'TO',
               'value' => 'TON',
               'codigo' => '776',
            ),
            231 =>
            array(
               'ordem' => 232,
               'text' => 'Trinidad and Tobago',
               'sigla2' => 'TT',
               'value' => 'TTO',
               'codigo' => '780',
            ),
            232 =>
            array(
               'ordem' => 233,
               'text' => 'Tunísia',
               'sigla2' => 'TN',
               'value' => 'TUN',
               'codigo' => '788',
            ),
            233 =>
            array(
               'ordem' => 234,
               'text' => 'Turcomenistão',
               'sigla2' => 'TM',
               'value' => 'TKM',
               'codigo' => '795',
            ),
            234 =>
            array(
               'ordem' => 235,
               'text' => 'Turquia',
               'sigla2' => 'TR',
               'value' => 'TUR',
               'codigo' => '792',
            ),
            235 =>
            array(
               'ordem' => 236,
               'text' => 'Tuvalu',
               'sigla2' => 'TV',
               'value' => 'TUV',
               'codigo' => '798',
            ),
            236 =>
            array(
               'ordem' => 237,
               'text' => 'Ucrânia',
               'sigla2' => 'UA',
               'value' => 'UKR',
               'codigo' => '804',
            ),
            237 =>
            array(
               'ordem' => 238,
               'text' => 'Uganda',
               'sigla2' => 'UG',
               'value' => 'UGA',
               'codigo' => '800',
            ),
            238 =>
            array(
               'ordem' => 239,
               'text' => 'Uruguai',
               'sigla2' => 'UY',
               'value' => 'URY',
               'codigo' => '858',
            ),
            239 =>
            array(
               'ordem' => 240,
               'text' => 'Uzbequistão',
               'sigla2' => 'UZ',
               'value' => 'UZB',
               'codigo' => '860',
            ),
            240 =>
            array(
               'ordem' => 241,
               'text' => 'Vanuatu',
               'sigla2' => 'VU',
               'value' => 'VUT',
               'codigo' => '548',
            ),
            241 =>
            array(
               'ordem' => 242,
               'text' => 'Vaticano',
               'sigla2' => 'VA',
               'value' => 'VAT',
               'codigo' => '336',
            ),
            242 =>
            array(
               'ordem' => 243,
               'text' => 'Venezuela',
               'sigla2' => 'VE',
               'value' => 'VEN',
               'codigo' => '862',
            ),
            243 =>
            array(
               'ordem' => 244,
               'text' => 'Vietnã',
               'sigla2' => 'VN',
               'value' => 'VNM',
               'codigo' => '704',
            ),
            244 =>
            array(
               'ordem' => 245,
               'text' => 'Zâmbia',
               'sigla2' => 'ZM',
               'value' => 'ZMB',
               'codigo' => '894',
            ),
            245 =>
            array(
               'ordem' => 246,
               'text' => 'Zimbábue',
               'sigla2' => 'ZW',
               'value' => 'ZWE',
               'codigo' => '716',
            ),
          );

        if(isset($selectedOption)) {
            $collect = collect($options);
            $result = $collect->where('value', $selectedOption)->first();
            if($result)
                return $result['text'];

            return '';
        }

        
        if(isset($storeOption)) {
            $collect = collect($options);
            $result = $collect->where('text', $storeOption)->first();
            if($result)
                return $result['value'];

            return '';
        }

        return $options;
    }
}







  