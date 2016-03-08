import Ember from 'ember';
import config from './config/environment';

const Router = Ember.Router.extend({
  location: config.locationType
});

Router.map(function() {
  this.route('movies', function() {
    this.route('create');
  });
  this.route('bookings', function() {
    this.route('create');
  });
  this.route('screens');
});

export default Router;
