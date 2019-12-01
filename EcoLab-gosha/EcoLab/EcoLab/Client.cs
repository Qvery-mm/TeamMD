using System;
using System.Collections.Generic;
using System.Text;

namespace EcoLab
{
    class Client
    {
        public string Login { get; set; }
        public string Password { get; set; }
        public string Email { get; set; }
        public string Tel_number { get; set; }
        public string Geopos { get; set; }
        public int Score { get; set; }

        public List<Event> CurrentListOfEvent = new List<Event> { };
    }
}
