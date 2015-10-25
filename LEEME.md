Pluralizador
============

Singularizar y pluralizar palabras en espa�ol.

## Uso ( sin Eloquent de Laravel ) 

* Singular
```
# Singular
> use Pluralizador\Infector as Str;
> $singularFromPlural = Str::singular("jueces");
> echo $singularFromPlural; // Salida: juez
```

* Plural
```
# Plural
> use Pluralizador\Infector as Str;
> $pluralFromSingular = Str::plural("juez");
> echo $pluralFromSingular; // Salida: jueces
```

## Uso con laravel

* Puedes usar esta libreria con Eloquent de Laravel. For more info: https://github.com/davidgomezgam/pluralizador-eloquent

## Contact

David G�mez

- https://github.com/davidgomezgam
- https://twitter.com/davidgomezgam
- davidgomezgam.com

## License

Pluralizador est� disponible bajo Licencia MIT. Mira el fichero LICENSE para m�s informaci�n.
