Pluralizador
============

Singularize and Pluralize Spanish words.

## Usage ( without Eloquent by Laravel ) 

* Singular
```
# Singular
> use Pluralizador\Infector as Str;
> $singularFromPlural = Str::singular("jueces");
> echo $singularFromPlural; // Output: juez
```

* Plural
```
# Plural
> use Pluralizador\Support\Str;
> $pluralFromSingular = Str::plural("juez");
> echo $pluralFromSingular; // Output: jueces
```

## Usage with Eloquent

* You can use this library with Eloquent by Laravel. For more info: https://github.com/davidgomezgam/pluralizador-eloquent

## Contact

David Gómez

- http://github.com/davidgomezgam
- http://twitter.com/davidgomezgam
- hola@davidgomezgam.com

## License

Pluralizador is available under the MIT license. See the LICENSE file for more info.
