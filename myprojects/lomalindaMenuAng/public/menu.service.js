(function(){

'use strict';

  angular.module('common.services')
  .factory('menu', [
      '$location',
      '$rootScope',
      function ($location) {

        var sections = [{
        }];

        sections.push({
          name: 'Desayunos',
          type: 'toggle',
          pages: [{
            name: 'PARA INICIAR EL DIA',
            type: 'link',
            state: 'home.desayunos.iniciar',
          }, {
            name: 'LOS CLASICOS',
            state: 'home.desayunos.clasicos',
            type: 'link'
          },
            {
              name: 'HUEVOS AL GUSTO',
              state: 'home.desayunos.huevos',
              type: 'link'
            },
            {
              name: 'LOS BAJOS EN CALORIAS',
              state: 'home.desayunos.bajos',
              type: 'link'
            },
            {
              name: 'COMPLEMENTOS',
              state: 'home.desayunos.complementos',
              type: 'link'
            },
            {
              name: 'FRASCO DE JUGO',
              state: 'home.desayunos.frasco',
              type: 'link'
            }]
        });

        sections.push({
          name: 'COMIDAS',
          type: 'toggle',
          pages: [{
            name: 'ENTRADAS',
            type: 'link',
            state: 'home.comidas.entradas',
          }, {
            name: 'SOPAS',
            state: 'home.comidas.sopas',
            type: 'link'
          },
            {
              name: 'ENSALADAS',
              state: 'home.comidas.ensaladas',
              type: 'link'
            },
            {
              name: 'POLLO',
              state: 'home.comidas.pollo',
              type: 'link'
            },
            {
              name: 'PESCADO Y MARISCOS',
              state: 'home.comidas.pescado',
              type: 'link'
            },
            {
              name: 'CARNES IMPORTADAS ANGUS QUALITY',
              state: 'home.comidas.carnes',
              type: 'link'
            },
            {
              name: 'SELECCION ESPECIAL LOMA LINDA',
              state: 'home.comidas.loma',
              type: 'link'
            },
            {
              name: 'SELECCION DE CARNES NACIONALES',
              state: 'home.comidas.nacionales',
              type: 'link'
            },
            {
              name: 'COMPLEMENTOS',
              state: 'home.comidas.comple',
              type: 'link'
            }]
        });

        sections.push({
          name: 'MENU INFANTIL',
          type: 'toggle',
          pages: [{
            name: 'COMIDA',
            type: 'link',
            state: 'home.menu.comida'
          }]
        });

        sections.push({
          name: 'POSTRES',
          type: 'toggle',
          pages: [{
            name: 'NUESTROS CLASICOS',
            type: 'link',
            state: 'home.postres.nuestros'
          }]
        });

        var self;

        return self = {
          sections: sections,

          toggleSelectSection: function (section) {
            self.openedSection = (self.openedSection === section ? null : section);
          },
          isSectionSelected: function (section) {
            return self.openedSection === section;
          },

          selectPage: function (section, page) {
            page && page.url && $location.path(page.url);
            self.currentSection = section;
            self.currentPage = page;
          }
        };

        function sortByHumanName(a, b) {
          return (a.humanName < b.humanName) ? -1 :
            (a.humanName > b.humanName) ? 1 : 0;
        }

      }]);
      
})();