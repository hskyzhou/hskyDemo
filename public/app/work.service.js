"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var http_1 = require('@angular/http');
var core_1 = require('@angular/core');
require('rxjs/add/operator/toPromise');
var WorkService = (function () {
    function WorkService(http) {
        this.http = http;
        this.addWorkUrl = 'work'; // URL to web api
        this.workListUrl = 'work/lists'; // URL to web api
        this.recentWorkUrl = 'work/recentlists'; // URL to web api
        this.sendWeekWorkUrl = 'work/sendweekwork'; // URL to web api
        this.headers = new http_1.Headers({ 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.getToken() });
    }
    WorkService.prototype.addWork = function (work) {
        return this.http
            .post(this.addWorkUrl, JSON.stringify(work), { headers: this.headers })
            .toPromise()
            .then(function (res) { return res.json().data; })
            .catch(this.handleError);
    };
    WorkService.prototype.getWork = function () {
        return this.http
            .get(this.workListUrl)
            .toPromise()
            .then(function (res) { return res.json().data; })
            .catch(this.handleError);
    };
    WorkService.prototype.getRecentWork = function () {
        return this.http
            .get(this.recentWorkUrl)
            .toPromise()
            .then(function (res) { return res.json().data; })
            .catch(this.handleError);
    };
    WorkService.prototype.sendWeekWork = function (info) {
        return this.http
            .post(this.sendWeekWorkUrl, JSON.stringify(info), { headers: this.headers })
            .toPromise()
            .then(function (res) { return res.json(); })
            .catch(this.handleError);
    };
    WorkService.prototype.getToken = function () {
        var token = document.querySelector('meta[property="csrf-token"]')['content'];
        return token;
    };
    WorkService.prototype.handleError = function (error) {
        console.error('An error occurred', error); // for demo purposes only
        return Promise.reject(error.message || error);
    };
    WorkService = __decorate([
        core_1.Injectable(), 
        __metadata('design:paramtypes', [http_1.Http])
    ], WorkService);
    return WorkService;
}());
exports.WorkService = WorkService;

//# sourceMappingURL=work.service.js.map
