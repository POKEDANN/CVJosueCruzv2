(function () {

  'use strict';

// Declare app level module which depends on filters, and services

  angular.module('myMenuApp', [
    'myMenuApp.controllers',
    'ngAnimate',
    'ui.router',
    'ngMaterial',
    'ngAria',

  ])
    .config(function ($mdThemingProvider) {
      $mdThemingProvider.theme('default')
        .primaryPalette('light-blue', {
          'default': '300'
        })
        .accentPalette('deep-orange', {
          'default': '500'
        });
    })
    .config(['$stateProvider', '$urlRouterProvider', '$logProvider', 
    function ($stateProvider, $urlRouterProvider) {

      $urlRouterProvider.otherwise("/");

      $stateProvider
        .state('home', {
          url: '/',

          views: {

            '@': {
              templateUrl: 'home.view.html',
              controller: 'HomeCtrl as vm'
            }
          }
        })
        .state('home.desayunos', {
          url: 'Desayunos',
          abstract: true
        })
        .state('home.desayunos.iniciar', {
          url: '/iniciar',

          views: {

            'content@home': {
              templateUrl: 'iniciar.view.html'
            }
          }
        })
        .state('home.desayunos.clasicos', {
          url: '/clasicos',

          views: {

            'content@home': {
              templateUrl: 'clasicos.view.html'
            }
          }
        })
         .state('home.desayunos.huevos', {
          url: '/huevos',

          views: {

            'content@home': {
              templateUrl: 'huevos.view.html'
            }
          }
        })
         .state('home.desayunos.bajos', {
          url: '/bajos',

          views: {

            'content@home': {
              templateUrl: 'calorias.view.html'
            }
          }
        })
         .state('home.desayunos.complementos', {
          url: '/complementosuno',

          views: {

            'content@home': {
              templateUrl: 'complementosuno.view.html'
            }
          }
        })
         .state('home.desayunos.frasco', {
          url: '/frasco',

          views: {

            'content@home': {
              templateUrl: 'frasco.view.html'
            }
          }
        })
        .state('home.comidas', {
          url: 'Comidas',
          
        })
         .state('home.comidas.entradas', {
          url: '/entradas',

          views: {

            'content@home': {
              templateUrl: 'entradas.view.html'
            }
          }
        })
         .state('home.comidas.sopas', {
          url: '/sopas',

          views: {

            'content@home': {
              templateUrl: 'sopas.view.html'
            }
          }
        })
         .state('home.comidas.ensaladas', {
          url: '/ensaladas',

          views: {

            'content@home': {
              templateUrl: 'ensaladas.view.html'
            }
          }
        })
         .state('home.comidas.pollo', {
          url: '/pollo',

          views: {

            'content@home': {
              templateUrl: 'pollo.view.html'
            }
          }
        })
         .state('home.comidas.pescado', {
          url: '/pescado',

          views: {

            'content@home': {
              templateUrl: 'pescados.view.html'
            }
          }
        })
         .state('home.comidas.carnes', {
          url: '/carnes',

          views: {

            'content@home': {
              templateUrl: 'carnes.view.html'
            }
          }
        })
         .state('home.comidas.loma', {
          url: '/loma',

          views: {

            'content@home': {
              templateUrl: 'seleccionuno.view.html'
            }
          }
        })
         .state('home.comidas.nacionales', {
          url: '/nacionales',

          views: {

            'content@home': {
              templateUrl: 'selecciondos.view.html'
            }
          }
        })
         .state('home.comidas.comple', {
          url: '/complementos',

          views: {

            'content@home': {
              templateUrl: 'complementosdos.view.html'
            }
          }
        })
         .state('home.menu', {
          url: 'Menu infantil',
          
        })
         .state('home.menu.comida', {
          url: '/comidaniños',

          views: {

            'content@home': {
              templateUrl: 'menuinfantil.view.html'
            }
          }
        })
         .state('home.postres', {
          url: 'Postres',
          
        })
         .state('home.postres.nuestros', {
          url: '/postres',

          views: {

            'content@home': {
              templateUrl: 'postres.view.html'
            }
          }
        })
         
    }])
    //take all whitespace out of string
    .filter('nospace', function () {
      return function (value) {
        return (!value) ? '' : value.replace(/ /g, '');
      };
    })
    //replace uppercase to regular case
    .filter('humanizeDoc', function () {
      return function (doc) {
        if (!doc) return;
        if (doc.type === 'directive') {
          return doc.name.replace(/([A-Z])/g, function ($1) {
            return '-' + $1.toLowerCase();
          });
        }
        
        return doc.label || doc.name;
      };
  });

})();