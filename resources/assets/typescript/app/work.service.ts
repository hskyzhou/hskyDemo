import { Headers, RequestOptions, Http } from '@angular/http';
import { Injectable } from '@angular/core';

import 'rxjs/add/operator/toPromise';

import { Work } from './work';

@Injectable()
export class WorkService{
	private addWorkUrl = 'work';  // URL to web api
	private workListUrl = 'work/lists';  // URL to web api
	private recentWorkUrl = 'work/recentlists';  // URL to web api
	private sendWeekWorkUrl = 'work/sendweekwork';  // URL to web api
	private headers = new Headers({
		'Content-Type': 'application/json',
		'X-CSRF-TOKEN' : "safafa",
	});

	constructor(private http : Http){
	}

	addWork(work : Work) : Promise<Work>{
		let headers = new Headers({ 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.getToken()});
		return this.http
			.post(this.addWorkUrl, JSON.stringify(work), {headers : headers})
			.toPromise()
			.then(res => res.json().data)
			.catch(this.handleError);
	}

	getWork() : Promise<Work[]>{
		return this.http
			.get(this.workListUrl)
			.toPromise()
			.then(res => res.json().data as Work[])
			.catch(this.handleError);
	}

	getRecentWork() : Promise<Work[]>{
		return this.http
			.get(this.recentWorkUrl)
			.toPromise()
			.then(res => res.json().data as Work[])
			.catch(this.handleError);
	}

	sendWeekWork() : Promise<Object>{
		return this.http
			.post(this.sendWeekWorkUrl)
			.toPromise()
			.then(res => res.json() as Object)
			.catch(this.handleError);
	}

	getToken() {
		let token = document.querySelector('meta[property="csrf-token"]')['content'];
		return token;
	}

	private handleError(error: any): Promise<any> {
	  console.error('An error occurred', error); // for demo purposes only
	  return Promise.reject(error.message || error);
	}
}