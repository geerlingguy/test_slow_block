# README

This module is meant solely to test BigPipe in Drupal 8. The module provides one block, the "Test Slow Block", which takes a while to render, and sets its cache `max-age` to `0`, deeming the block uncacheable.

If you're logged out / anonymous, the block will still be cached if the anonymous page cache is enabled. However, if you're logged in, the block will take 10s to render and won't be cached due to the `max-age` setting.

BigPipe only works for authenticated users, but requires certain settings in your webserver environment; see the [BigPipe environment requirements](https://www.drupal.org/documentation/modules/big_pipe/environment) for more information.

## To Test

  1. Enable this module (requires BigPipe).
  2. Place an instance of the 'Test Slow Block' in your theme.
  3. Visit a page where the block is displayed as a logged-in user.

If BigPipe is working and your environment is configured correctly, you should see the entire page load, then after a long delay, this block will render where you placed it.

If BigPipe is not working or your environment is not configured correctly, the page will take a long while to load, even after refreshing a few times.

For more information on envrionment configuration and testing in Drupal VM, see: https://github.com/geerlingguy/drupal-vm/issues/527
