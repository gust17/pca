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






  