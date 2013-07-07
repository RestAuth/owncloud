<?php

require_once('RestAuth/restauth.php');

class OC_User_RestAuth extends OC_User_Backend{
	private $conn;

	public function __construct($host, $user, $password) {
		$this->conn = new RestAuthConnection($host, $user, $password);
	}

	/**
	 * @brief Check if the password is correct
	 * @param $uid The username
	 * @param $password The password
	 * @returns true/false
	 *
	 * Check if the password is correct without logging in the user
	 */
	public function checkPassword($uid, $password) {
		try {
			$user = new RestAuthUser($this->conn, $uid);
			if ($user->verifyPassword($password)) {
				return $uid;
			} else {
				return false;
			}
		} catch (RestAuthException $e) {
			return false;
		}
	}

	/**
	 * NOTE: This gets called many times on login, so we just return true.
	 */
	public function userExists($uid) {
		return true;
	}

        /**
         * @brief Check if a user list is available or not
         * @return boolean if users can be listed or not
         */
//        public function hasUserListings() {
//                return false;
//        }

        /**
        * @brief Get a list of all users
        * @returns array with all uids
        *
        * Get a list of all users.
        */
//        public function getUsers($search = '', $limit = null, $offset = null) {
//                return array();
//        }

        /**
        * @brief check if a user exists
        * @param string $uid the username
        * @return boolean
        */
//        public function userExists($uid) {
//                return false;
//        }

        /**
        * @brief get the user's home directory
        * @param string $uid the username
        * @return boolean
        */
//        public function getHome($uid) {
//                return false;
//        }

        /**
         * @brief get display name of the user
         * @param $uid user ID of the user
         * @return display name
         */
//        public function getDisplayName($uid) {
//                return $uid;
//        }

        /**
        * @brief delete a user
        * @param $uid The username of the user to delete
        * @returns true/false
        *
        * Deletes a user
        */
//        public function deleteUser( $uid ) {
//                return false;
//        }
}
