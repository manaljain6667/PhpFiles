using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Loginpage
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _email;
        protected int _phoneno;
        protected string _password;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string username, string email, int phoneno, string password)
        {
            this._username=username;
            this._email=email;
            this._phoneno=phoneno;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual int Phoneno
        {
            get {return _phoneno;}
            set {_phoneno=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        #endregion
    }
    #endregion
}