import React from 'react';
import { useQuery, gql, useMutation } from '@apollo/client';
    const Users = () => {
        const Utilisateurs = gql `
				query FetchUsers {
					users{
						telephone,
						id,
						login,
						role,
						email,
						nom,
						postnom,
						prenom
					}
				}
					`;

        const DELETE_USER = gql `
					mutation deleteUser($id: int!){
						deleteUser(id: $id){
							id,
							login,
							nom,
							postnom,
							prenom,
							email,
							role,
							telephone
						}
					}
				`;

        const { loading, error, data } = useQuery(Utilisateurs);
        if (loading) return `mama miya`;
        if (error) return `Error! ${error}`;
        return data.users.map(({
            id,
            login,
            nom,
            postnom,
            prenom,
            email,
            role,
            telephone
        }) => (<tr key={ id } >
            <td> { nom } </td>
						<td> { postnom } </td>
						<td> { prenom } </td>
						<td>
	            <a>
		            <img src="/assets/images/users/1.jpg"
		            alt="user"
		            className="rounded-circle"
		            width="30" /> { login }
							</a>
						</td >
            <td>
            	<a href="" className = "__cf_email__" > { email } </a>
						</td>
						<td> { telephone } </td>
						<td>
            	<span className = "label label-danger" > { role } </span>
						</td>
						<td>
	            <button type="button"
	            	className="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
	            	data-toggle="tooltip"
	            	data-original-title="Delete" onClick={ e => {
										e.preventDefault();
										console.log(id);
										const[deleteUser, {data} ] = useMutation(DELETE_USER);
										deleteUser({ variables: { id: 26 } });
									}
								}>
	             	<i className="ti-close" aria-hidden="true"> </i>
							 </button>
						 </td>
						</tr>
        ));
    }
export default Users;
