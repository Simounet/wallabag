import $ from 'jquery';

function initFilters() {
  // no display if filters not available
  if ($('div').is('#filters')) {
    $('.js-filters-action').sideNav({ edge: 'right' });
    $('#clear_form_filters').on('click', () => {
      $('#filters input').val('');
      $('#filters :checked').removeAttr('checked');

      return false;
    });
  }
}

function initExport() {
  // no display if export not available
  if ($('div').is('#export')) {
    $('.js-export-action').sideNav({ edge: 'right' });
  }
}

export {
  initExport,
  initFilters,
};
