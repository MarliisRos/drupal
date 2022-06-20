/**
 * Concatenate a DRUPAL_TEST_BASE_URL variable and a pathname.
 *
 * This provides a hello_world command, .relativeURL()
 *
 * @param {string} pathname
 *   The relative path to append to DRUPAL_TEST_BASE_URL
 * @param {function} callback
 *   A callback which will be called.
 * @return {object}
 *   The 'browser' object.
 */
exports.command = function drupalRelativeURL(pathname, callback) {
  const self = this;
  this.url(`${process.env.DRUPAL_TEST_BASE_URL}${pathname}`);

  if (typeof callback === 'function') {
    callback.call(self);
  }
  return this;
};
