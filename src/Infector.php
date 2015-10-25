<?php

namespace Pluralizador;

use Stringy\StaticStringy;
/**
 * La clase infector contiene los métodos estáticos para la conversión de singular a plural y
 * viceversa
 *
 * @link   www.davidgomezgam.com
 * @since  0.1
 * @author David Gomez <hola@davidgomezgam.com>
 */
class Infector
{
    /**
     * Plurales irregulares (plural => singular)
     *-------
     * @var array
     */
    private static $irregular = [
        'oes' => 'o',
        "esprais" => "espray",
        "noes" => "no",
        "yoes" => "yos",
        "volumenes" => "volumen",
        "cracs" => "crac",
        "albalaes" => "albala",
        "faralaes" => "farala",
        "clubes" => "club",
        "paases" => "paas",
        "jerseis" => "jersey",
        "especamenes" => "especimen",
        "caracteres" => "caracter",
        "menus" => "menu",
        "regamenes" => "regimen",
        "curraculos" => "curriculum",
        "ultimatos" => "ultimatum",
        "memorandos" => "memroandum",
        "referendos" => "referendum",
        "canciones" => "cancion",
        "sandwiches" => "sandwich",
        "migrations" => "migration"
    ];

    /**
     * Palabras invariables
     *
     * @var array
     */
    private static $invariable = [
        "abrelatas",
        "afrikaans",
        "afueras",
        "albricias",
        "aledaños",
        "alias",
        "alicates",
        "andurriales",
        "analisis",
        "atlas",
        "caries",
        "cascarrabias",
        "compost",
        "cortaplumas",
        "creces",
        "crisis",
        "cuelgacapas",
        "cumpleaños",
        "cuadriceps",
        "dosis",
        "dux",
        "deficit",
        "escolaridad",
        "enseres",
        "esponsales",
        "exequias",
        "fauces",
        "facciones",
        "forceps",
        "gafas",
        "gargaras",
        "guardarropas",
        "hipotesis",
        "honorarios",
        "jueves",
        "lavacoches",
        "limpiabotas",
        "lunes",
        "maitines",
        "marcapasos",
        "martes",
        "metamorfosis",
        "miercoles",
        "mondadientes",
        "modales",
        "nupcias",
        "parabrisas",
        "paracaadas",
        "paraguas",
        "pararrayos",
        "pisapapeles",
        "portaaviones",
        "portaequipajes",
        "quitamanchas",
        "rascacielos",
        "rompeolas",
        "sacacorchos",
        "salvavidas",
        "salvavidas",
        "saltamontes",
        "sms",
        "santesis",
        "tesis",
        "test",
        "tenazas",
        "tijeras",
        "triceps",
        "trust",
        "vacaciones",
        "valses",
        "vaveres",
        "viacrucis",
        "viernes",
        "virus",
        "viveres",
        "extasis",
    ];

    /**
     * Palabras incontables.
     *
     * @var array
     */
    private static $noPlural = [
        "adolescencia",
        "azucar",
        "calor",
        "cafe",
        "canal",
        "caos",
        "cariz",
        "carne",
        "decrepitud",
        "descanso",
        "el",
        "el",
        "ella",
        "ellas",
        "ellos",
        "equipaje",
        "estambre",
        "este",
        "eternidad",
        "fenix",
        "generosidad",
        "grima",
        "hambre",
        "hielo",
        "hojaldre",
        "lente",
        "linde",
        "mar",
        "margen",
        "nada",
        "nadie",
        "norte",
        "nosotras",
        "nosotros",
        "oeste",
        "panico",
        "pereza",
        "poblacion",
        "policia",
        "pringue",
        "pringue",
        "publico",
        "salud",
        "sed",
        "sur",
        "te",
        "tez",
        "tilde",
        "tizne",
        "tu",
        "tu",
        "viescas",
        "vosotras",
        "vosotros",
        "yo",
    ];

    /**
     * Reglas para formar el singular (ends => cut)
     *
     * @var array
     */
    private static $singularRules = [
        'particular' =>
        [
            'z' => 'ces',
        ],
        'normal' =>
        [
            'es',
            's'
        ]
    ];

    /**
     * Reglas para formar el plural (add => cut)
     *
     * @var array
     */
    private static $pluralRules = [
        'particular' =>
        [
            'ces' => 'z',
        ],
        'normal' =>
        [
            's' => '/[aeo]$/i',
            'es' => '/[^iu]$/i',
        ]
    ];

    /**
     * Formar singular de una palabra
     *
     * @param string $string
     * @return string
     */
    public function singular( $string )
    {
        $value = static::toAscii( $string );

        //
        // Comprobamos que no sea una palabra irregular
        if( isset( static::$irregular[$value] ) )
            return static::$irregular[$value];

        //
        // Comprobamos que no sea una palabra invariable
        if( in_array($value, static::$invariable) || in_array($value, static::$noPlural) )
            return $value;


        //
        // Comprobamos si es un plural irregular
        if( $cut = static::endsWith($value, static::$singularRules['particular']) )
        {
            return static::cut($value, $cut) . array_search ( $cut, static::$singularRules['particular'] );
        }

        //
        // Comprobamos si es un plural normal
        if( $cut = static::endsWith($value, static::$singularRules['normal']) )
        {
            return static::cut($value, $cut);
        }

        //
        // En caso de no cumplir ninguna regla, devolvemos la palabra dada
        return $value;

    }

    /**
     * Formar singular de una palabra
     *
     * @param string $string
     * @return string
     */
    public function plural( $string )
    {
        $value = static::toAscii( $string );

        //
        // Comprobamos que no sea una palabra irregular
        if( $key = array_search($value, static::$irregular ) )
            return $key;

        //
        // Comprobamos que no sea una palabra invariable
        if( in_array($value, static::$invariable) || in_array($value, static::$noPlural) )
            return $value;


        //
        // Comprobamos si es un plural irregular
        if( $cut = static::endsWith($value, static::$pluralRules['particular']) )
        {
            return static::cut($value, $cut) . array_search ( $cut, static::$pluralRules['particular'] );
        }

        //
        // Comprobamos si es un plural normal
        if( $put = static::endsWith_match($value, static::$pluralRules['normal']) )
        {
            return $value . $put;
        }

        //
        // En caso de no cumplir ninguna regla, devolvemos la palabra dada.
        return $value;

    }
    /**
     * Cortar sufijo de un string.
     *
     * @param string $string
     * @param string $suffix
     * @return string
     */
    public function cut( $string, $suffix)
    {
        return preg_replace('/' . $suffix . '*$/', '', $string);
    }

    /**
     * Comprueba si la palabra dada es invariable.
     *
     * @param string $value
     * @return bool
     */
    public static function invariable( $value )
    {
        return in_array( strtolower( $value ), static::$invariable);
    }

    /**
     * UTF-8 string a ASCII.
     *
     * @param  string  $value
     * @return string
     */
    public static function toAscii( $value )
    {
        $value = (string) StaticStringy::toAscii($value);

        //
        // Eliminamos todos los números
        $value = preg_replace('/\d+/', '', $value );

        //
        // Eliminamos todos los caracteres extraños
        $value = preg_replace('![^\pL\pN]+!u', '', mb_strtolower($value));

        return $value;
    }

    /**
     * Convertir string en camel case
     *
     * @param string $value
     * @return string
     */
    public static function toCamel($value)
    {
        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)) );
    }

    /**
     * Comprobar si un string con un substring dado.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return string|bool
     */
    public static function endsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {

            if ((string) $needle === substr($haystack, -strlen($needle)))
            {
                return $needle;
            }
        }

        return false;
    }

    /**
     * Comprobar si un string finaliza dado una expresión
     *
     * @param string $string
     * @param string|array $needles
     * @return bool|string
     */
    public static function endsWith_match($string, $needles)
    {
        foreach( (array) $needles as $key => $needle )
        {
            if( preg_match((string) $needle, $string) )
                return $key;
        }

        return false;
    }

}