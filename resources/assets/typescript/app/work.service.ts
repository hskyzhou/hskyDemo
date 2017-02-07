import { Headers, RequestOptions, Http } from '@angular/http';
import { Injectable } from '@angular/core';

import 'rxjs/add/operator/toPromise';

import { Work } from './work';

@Injectable()
export class WorkService{
	private addWorkUrl = 'work/save';  // URL to web api
	private headers = new Headers({'Content-Type': 'application/json'});

	constructor(private http : Http){

	}

	addWork(work : Work) : Promise<Work>{
		return this.http
			.post(this.addWorkUrl, JSON.stringify(work), {headers : this.headers})
			.toPromise()
			.then(res => res.json().data)
			.catch(this.handleError);
	}

	private handleError(error: any): Promise<any> {
	  console.error('An error occurred', error); // for demo purposes only
	  return Promise.reject(error.message || error);
	}
}