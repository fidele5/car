import React from 'react';
import { render } from 'react-dom';
import { ApolloProvider } from '@apollo/client';
import { ApolloClient, InMemoryCache } from '@apollo/client';
import Home from './home';
import Users from './users'

function App() {
    return (
			<ApolloProvider client={ client }>
        <Home>
				<div className="row">
	        <div className="col-lg-8 col-xl-9 col-md-9">
	          <div className="card" id="user">
	            <div className="card-body">
	              <div className="d-flex no-block align-items-center mb-4">
	                <h4 className="card-title">All Contacts</h4>
	                <div className="ml-auto">
	                  <div className="btn-group">
	                    <button type="button" className="btn btn-dark" data-toggle="modal" data-target="#createmodel">
	                      Create New Contact
	                    </button>
	                  </div>
	                </div>
	              </div>
	              <div className="table-responsive">
									<table id="file_export" className="table table-bordered nowrap display">
										<thead>
											<tr>
												<th>Nom</th>
												<th>Postnom</th>
												<th>Prenom</th>
												<th>Login</th>
												<th>Email</th>
												<th>Telephone</th>
												<th>Role</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
        						<Users />
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
							<div className="col-lg-4 col-xl-3 col-md-3">
								<div className="card">
									<div className="border-bottom p-15">
										<button type="button" className="btn btn-info" data-toggle="modal" data-target="#Sharemodel"
																	 >
											<i className="ti-share mr-2"></i> Share With
										</button>
									</div>
									<div className="card-body">
										<form>
											<div className="input-group mb-3">
												<div className="input-group-prepend">
													<span className="input-group-text"><i className="ti-search"></i></span>
												</div>
												<input type="text" className="form-control" placeholder="Search Contacts Here..."
																					 aria-label="Amount (to the nearest dollar)"/>
												<div className="input-group-append">
													<button className="btn btn-info">Ok</button>
												</div>
											</div>
										</form>
									<div className="list-group mt-4">
										<a href="#" className="list-group-item active"><i
																					 className="ti-layers mr-2"></i> All Contacts</a>
										<a href="#" className="list-group-item"><i className="ti-star mr-2"></i>
																			 Favourite Contacts</a>
										<a href="#" className="list-group-item"><i
																					 className="ti-bookmark mr-2"></i> Recently Created</a>
									</div>
									<h4 className="card-title mt-4">Groups</h4>
									<div className="list-group">
										<a href="#" className="list-group-item">
											<i className="ti-flag-alt-2 mr-2"></i> Success Warriers
												<span className="badge badge-info float-right">20</span>
										</a>
										<a href="#" className="list-group-item"><i className="ti-notepad mr-2"></i>
											Project
											<span className="badge badge-success float-right">12</span>
										</a>
										<a href="#" className="list-group-item"><i className="ti-target mr-2"></i>
											Envato Author
											<span className="badge badge-dark float-right">22</span>
										</a>
										<a href="#" className="list-group-item"><i
																					 className="ti-comments mr-2"></i> IT Friends
											<span className="badge badge-danger float-right">101</span>
										</a>
									</div>
									<h4 className="card-title mt-4">More</h4>
									<div className="list-group">
										<a href="#" className="list-group-item">
												<span className="badge badge-info mr-2"><i className="ti-import"></i></span> Import
													Contacts
										</a>
										<a href="#" className="list-group-item">
											<span className="badge badge-warning text-white mr-2"><i className="ti-export"></i></span> Export Contacts
										</a>
										<a href="#" className="list-group-item">
											<span className="badge badge-success mr-2"><i className="ti-share-alt"></i></span> Restore Contacts
										</a>
										<a href="#" className="list-group-item">
											<span className="badge badge-primary mr-2"><i className="ti-layers-alt"></i></span> Duplicate Contacts
										</a>
										<a href="#" className="list-group-item">
											<span className="badge badge-danger mr-2"><i className="ti-trash"></i></span> Delete All Contacts
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
        </Home>
        </ApolloProvider >
    );
}

const client = new ApolloClient({
    uri: 'http://localhost:8000/graphql',
    cache: new InMemoryCache()
});

render( <App /> , document.getElementById('root'));
